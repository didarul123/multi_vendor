<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WithdrawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('withdraws')->insert([
            'vendor_id' => 1,
            'merchant_id' => 0,
            'method_id' => 1,
            'amount' => 7500,
            'status' => 0
        ]);
        DB::table('withdraws')->insert([
            'vendor_id' => 2,
            'merchant_id' => 0,
            'method_id' => 4,
            'amount' => 15000,
            'status' => 0
        ]);
        DB::table('withdraws')->insert([
            'vendor_id' => 0,
            'merchant_id' => 1,
            'method_id' => 4,
            'amount' => 15000,
            'status' => 0
        ]);
    }
}
