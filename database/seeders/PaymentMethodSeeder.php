<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'name' => 'bKash',
            'status' => '1'
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Nagad',
            'status' => '1'
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Rocket',
            'status' => '0'
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Bank Transfer',
            'status' => '1'
        ]);
        DB::table('payment_methods')->insert([
            'name' => 'Paypal',
            'status' => '0'
        ]);
    }
}
