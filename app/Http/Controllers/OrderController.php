<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        

        $data = DB::table('orders')->insert(
            [ 
                'user_id' => \Auth::id(),
                'total' => Cart::total(),
                'created_at' => date('Y-m-d H:i:s'),
                'order_status' => 'pending'
            ]
        );

        $id = DB::getPdo()->lastInsertId();;

        foreach(Cart::content() as $item){
            DB::table('order_products')->insert(
                [
                    'order_id' => $id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty
                ]);
        }; 

        $total = Cart::total();
        $invoice = $id;

        Cart::destroy();


        return view('cart.checkout', ['amount' => $total, 'invoice' => $invoice]);
    }








}


