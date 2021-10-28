<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use DB;

class DeliveryManController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders_pending = DB::table('orders')               
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('customers', 'customers.user_id', '=', 'users.id')
        ->select('orders.order_id', 'orders.user_id', 'customers.location', 'customers.address', 'customers.customer_id', 'orders.total', 'orders.order_status')
        ->where('order_status', 'paid')
        ->get();

        $orders_completed =  DB::table('orders')               
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('customers', 'customers.user_id', '=', 'users.id')
        ->select('orders.order_id', 'orders.user_id', 'customers.location', 'customers.address', 'customers.customer_id', 'orders.total', 'orders.order_status')
        ->where('order_status', 'completed')
        ->get();

        return view('deliveryman.home', ['orders_pending' => $orders_pending, 'orders_completed' => $orders_completed]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deliveryman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('users')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "contact" => $request->contact,
            "role" => "3",
            "isAdmin" => False,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $id = DB::getPdo()->lastInsertId();

        DB::table('delivery_man')->insert([
            "location" => $request->location,
            "user_id" => $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('login')->with('success', 'Registration Successful. Please Log In.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery_man = DB::table('delivery_man')->where('dman_id', $id)->first();
        return view('admin.deliveryman.edit', ['delivery_man' => $delivery_man]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('delivery_man')
            ->where('dman_id', $id)
            ->update(
                [
                    'location' => $request->location,
                    'user_id' => $request->user_id
                ]
        );

        return redirect()->route('admin.deliverymen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show_order($id){

        $order = DB::table('orders')               
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('customers', 'customers.user_id', '=', 'users.id')
        ->select('orders.order_id', 'users.name', 'users.contact', 'customers.location', 'customers.address', 'customers.customer_id', 'orders.total', 'orders.order_status')
        ->where('orders.order_id', $id)
        ->first();

        $products = DB::table('orders')
        ->join('order_products', 'orders.order_id', '=', 'order_products.order_id')
        ->join('products', 'products.product_id', '=', 'order_products.product_id')
        ->join('shop_owners', 'products.shop_id', '=', 'shop_owners.shop_id')
        ->select('orders.order_id', 'products.product_id', 'products.shop_id', 'products.name', 'products.price', 'shop_owners.location', 'shop_owners.shop_name', 'order_products.quantity')
        ->where('orders.order_id', $id)
        ->get();

        return view('deliveryman.order', ['order' => $order, 'products'=> $products]);
    }


    public function deliver(Request $request){
        $id = $request->order_id;
        DB::table('orders')
        ->where('order_id', $id)
        ->update(
            [
                'order_status' => 'completed'
            ]
        );
        return redirect()->route('deliveryman.index');

    }


}
