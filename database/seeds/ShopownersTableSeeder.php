<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ShopOwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_owners')->insert([
            'user_id' => 3,
            'location' => 'Dhanmondi',
            'shop_name' => 'amazing store',
        ]);
    }
}
