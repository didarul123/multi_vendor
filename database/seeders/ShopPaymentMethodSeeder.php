<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopPaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_payment_methods')->insert([
            'shop_id' => 1,
            'payment_method_id' => 1,
        ]);
        DB::table('shop_payment_methods')->insert([
            'shop_id' => 1,
            'payment_method_id' => 2,
        ]);
        DB::table('shop_payment_methods')->insert([
            'shop_id' => 3,
            'payment_method_id' => 1,
        ]);
    }
}
