<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'id' => 1,
            'invoice_id' => 12001,
            'customer_id' => 2,
            'total_qty' => 2,
            'total_cost' => 2500,
            'payment_method' => 1,
            'transaction_id' => 1,
            'shipping_address' => 'Jatrabari, Dhaka',
            'city' => 'Dhaka',
            'postcode' => 1320,
            'country' => 'Bangladesh',
            'status' => 0,
        ]);
        DB::table('orders')->insert([
            'id' => 2,
            'invoice_id' => 12001,
            'customer_id' => 3,
            'total_qty' => 3,
            'total_cost' => 3000,
            'payment_method' => 23333,
            'transaction_id' => 1,
            'shipping_address' => 'Jatrabari, Dhaka',
            'city' => 'Dhaka',
            'postcode' => 1500,
            'country' => 'Bangladesh',
            'status' => 0,
        ]);
        DB::table('orders')->insert([
            'id' => 3,
            'invoice_id' => 20100,
            'customer_id' => 3,
            'total_qty' => 2,
            'total_cost' => 2000,
            'payment_method' => 1,
            'transaction_id' => 2332333,
            'shipping_address' => 'Jatrabari, Dhaka',
            'city' => 'Dhaka',
            'postcode' => 1500,
            'country' => 'Bangladesh',
            'status' => 0,
        ]);
    }
}
