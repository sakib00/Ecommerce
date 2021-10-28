<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [ 'name' => 'Ayon', 'email' => 'smunt@munni.com', 'password' => Hash::make('123456'), 'role' => '2', 'contact' => '1234567878', 'created_at' => date('Y-m-d H:i:s')],
            [ 'name' => 'Munni', 'email' => 'munty@munni.com', 'password' => Hash::make('123456'), 'role' => '2', 'contact' => '1234567878', 'created_at' => date('Y-m-d H:i:s')],
            [ 'name' => 'Auro', 'email' => 'smt@mmun.com', 'password' => Hash::make('123456'), 'role' => '1', 'contact' => '1234567878', 'created_at' => date('Y-m-d H:i:s')],
            [ 'name' => 'Munna', 'email' => 'mnty@munna.com', 'password' => Hash::make('123456'), 'role' => '3', 'contact' => '1234567878', 'created_at' => date('Y-m-d H:i:s')],
            ]);
        DB::table('shop_owners')->insert([
            [ 'user_id' => '1', 'location' => 'Dhanmondi', 'shop_name' => 'Shwapno', 'created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '2', 'location' => 'Bashundhara', 'shop_name' => 'Meena Bazar', 'created_at' => date('Y-m-d H:i:s')],
        ]);
        DB::table('customers')->insert([
            [ 'user_id' => '3', 'location' => 'Dhanmondi', 'address' => 'H-42, R-9', 'created_at' => date('Y-m-d H:i:s')],
        ]);
        DB::table('delivery_man')->insert([
            [ 'user_id' => '4', 'location' => 'Dhanmondi', 'created_at' => date('Y-m-d H:i:s')],
        ]);
        DB::table('products')->insert([
            [ 'shop_id' => '1', 'name' => 'Maggi Noodles', 'image' => '1.jpg', 'description' => 'Maggi 2 minutes Noodles', 'price' => '17', 'stock' => '200', 'created_at' => date('Y-m-d H:i:s')],
            [ 'shop_id' => '1', 'name' => 'Rice', 'image' => '2.jpg', 'description' => 'Rice 10tk/kg', 'price' => '10', 'stock' => '100', 'created_at' => date('Y-m-d H:i:s')],
            [ 'shop_id' => '2', 'name' => 'ACI Salt', 'image' => '3.png', 'description' => 'ACI Salt', 'price' => '35', 'stock' => '200', 'created_at' => date('Y-m-d H:i:s')],
            [ 'shop_id' => '2', 'name' => 'Pringles', 'image' => '4.jpg', 'description' => 'Chips', 'price' => '120', 'stock' => '20', 'created_at' => date('Y-m-d H:i:s')],
            [ 'shop_id' => '2', 'name' => 'Fresh Sugar', 'image' => '6.png', 'description' => 'Sugar', 'price' => '50', 'stock' => '20', 'created_at' => date('Y-m-d H:i:s')],        
            [ 'shop_id' => '2', 'name' => 'Bombay Chanachur', 'image' => '7.jpeg', 'description' => 'Small', 'price' => '35', 'stock' => '20', 'created_at' => date('Y-m-d H:i:s')],        
            [ 'shop_id' => '2', 'name' => 'Pran Sauce', 'image' => '6.jpeg', 'description' => 'Some sauce boss?', 'price' => '2', 'stock' => '20', 'created_at' => date('Y-m-d H:i:s')],        
        
            ]);
        
   }
}
