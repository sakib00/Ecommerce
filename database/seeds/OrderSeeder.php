<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('orders')->insert([
        'user_id'=> 3 ,
        'contact' => '01712141516',
        'email' => 'chuchu@da.com',
        'shipping_address' => '2/6, Shyamoli, Dhaka',
        'is_paid' => '0',
        'is_completed' => '0',
        'seen_by_admin' => '0',
        ]);
    }
}
