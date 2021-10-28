<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    //show all product
    public function index(){

        $products = DB::table('products')->get();

        return view('product.products', ['products' => $products]);
    }

    public function search(Request $request){
        $searchTerm = $request->term;
        $products = DB::table('products')   
        ->where('name', 'LIKE', "%{$searchTerm}%") 
        ->orWhere('description', 'LIKE', "%{$searchTerm}%") 
        ->get();

        return view('search',['products' => $products, 'number_results' => $products->count()]);

    }


    //show the add product form

    public function create(){
        $shop_owners = DB::table('shop_owners')->get();
    
        return view('admin.products.create',['shop_owners' => $shop_owners]);

    }

    //store a row into the database

    public function store(Request $request){

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

        return redirect()->route('admin.products')
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);;

    }

    public function edit($id){
        $product = DB::table('products')->where('product_id', $id)->first();
        return view('admin.products.edit', ['product' => $product]);
    }

    public function update($id, Request $request){
        DB::table('products')
            ->where('product_id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'stock' => $request->stock,
                    'price' => $request->price
                ]
        );

        return redirect()->route('admin.products');

    }
    public function destroy($id){

        DB::table('products')->where('product_id', $id)->delete();
        
    }


    //show a specific product
    public function show($id){
        $product = DB::table('products')->where('product_id', $id)->first();
        return view('product.product', ['product' => $product]);
    }

    //show all product (admin panel)


   
}
