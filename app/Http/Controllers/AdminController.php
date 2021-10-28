<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customers(){
        $customers = DB::table('customers')
        ->join('users', 'customers.user_id', '=', 'users.id')
        ->select('customers.customer_id',  'customers.user_id', 'customers.location', 'customers.address','users.name','users.email', 'users.contact', 'customers.created_at', 'customers.updated_at')
        ->get();
        return view('admin.customers.customers', ['customers' => $customers]);
    }

    public function deliverymen(){
        $deliverymen = DB::table('delivery_man')
        ->join('users', 'delivery_man.user_id', '=', 'users.id')
        ->select('delivery_man.dman_id',  'delivery_man.user_id', 'delivery_man.location', 'users.name','users.email', 'users.contact', 'delivery_man.created_at', 'delivery_man.updated_at')
        ->get();
        return view('admin.deliveryman.deliveryman', ['deliverymen' => $deliverymen]);
    }

    public function products(){
        $products_shops = DB::table('products')
        ->join('shop_owners', 'products.shop_id', '=', 'shop_owners.shop_id')
        ->select('products.product_id',  'shop_owners.shop_id', 'products.price', 'products.stock','products.description', 'products.image', 'products.name', 'products.created_at', 'products.updated_at','shop_owners.shop_name','shop_owners.location')
        ->get();

        return view('admin.products.products', ['products' => $products_shops]);
    }
    
    public function shopowners(){
        $shop_owners = DB::table('shop_owners')->get();
        return view('admin.shopowners.shopowners', ['shop_owners' => $shop_owners]);
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
}
