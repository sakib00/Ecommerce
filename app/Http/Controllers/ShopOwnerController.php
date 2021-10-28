<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use DB;

class ShopOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = DB::table('shop_owners')
        ->join('users', 'shop_owners.user_id', '=', 'users.id')
        ->select('shop_owners.shop_id','shop_owners.shop_name','shop_owners.location', 'shop_owners.user_id', 'shop_owners.location', 'shop_owners.shop_name','users.name','users.email', 'users.contact')
        ->where('users.id', \Auth::user()->id)
        ->first();
        $products = DB::table('shop_owners')
        ->join('products', 'products.shop_id', '=', 'shop_owners.shop_id')
        ->join('users', 'shop_owners.user_id', '=', 'users.id')
        ->select('products.product_id', 'products.price', 'products.stock','products.description', 'products.image', 'products.name', 'products.created_at', 'products.updated_at')
        ->where('users.id', \Auth::user()->id)
        ->get();

        return view('shopowner.home', ['products' => $products , 'shop' => $shop]);

    }

    public function create(){
        return view('admin.shopowners.create');

    }

    public function store(Request $request){


        DB::table('users')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "contact" => $request->contact,
            "role" => "2",
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $id = DB::getPdo()->lastInsertId();

        DB::table('shop_owners')->insert([
            "shop_name" => $request->shop_name,
            "location" => $request->location,
            "user_id" => $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('login')->with('success', 'Registration Successful. Please Log In.');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $shop_owner = DB::table('shop_owners')->where('shop_id', $id)->first();
        return view('admin.shopowners.edit', ['shop_owner' => $shop_owner]);
    }

    public function update($id, Request $request){
        DB::table('shop_owners')
            ->where('shop_id', $id)
            ->update(
                [
                    'location' => $request->location,
                    'shop_name' => $request->shop_name
                ]
        );

        return redirect()->route('admin.shopowners');

    }

    public function productcreate(){
        $shop = DB::table('shop_owners')
        ->join('users', 'shop_owners.user_id', '=', 'users.id')
        ->select('shop_owners.shop_id')
        ->where('users.id', \Auth::user()->id)
        ->first();
        $shop_id = $shop->shop_id;
    
        return view('shopowner.createproduct',['shop_id' => $shop_id]);

    }

    public function productstore(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);
   


        DB::table('products')->insert(
            [ 
                'name' => $request->name,
                'stock' => $request->stock,
                'price' => $request->price,
                'image' => $imageName,
                'shop_id' => $request->shop_id,
                'description' => $request->description,
                'created_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('shopowner.index')
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);;

    }


    public function productedit($id){
        $product = DB::table('products')->where('product_id', $id)->first();
        return view('shopowner.editproducts', ['product' => $product]);
    }


    public function productupdate($id, Request $request){
        DB::table('products')
            ->where('product_id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'stock' => $request->stock,
                    'price' => $request->price
                ]
        );

        return redirect()->route('shopowner.index');

    }


    public function productdestroy($id){

        DB::table('products')->where('product_id', $id)->delete();
        return redirect()->route('shopowner.index');

        
    }


}