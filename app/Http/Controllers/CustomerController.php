<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('customers')->get();

        return view('customer.customers', ['customers' => $customers]);

    }

    public function create()
    {
        return view('admin.customers.create');

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
            "role" => "1",
            "isAdmin" => False,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $id = DB::getPdo()->lastInsertId();

        DB::table('customers')->insert([
            "location" => $request->location,
            "address" => $request->address,
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
        $customer = DB::table('customers')->where('customer_id', $id)->first();
        return view('admin.customers.edit', ['customer' => $customer]);
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
        DB::table('customers')
            ->where('customer_id', $id)
            ->update(
                [
                    'location' => $request->location,
                    'user_id' => $request->user_id
                ]
        );

        return redirect()->route('admin.customers');
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
