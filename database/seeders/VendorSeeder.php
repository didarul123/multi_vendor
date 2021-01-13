<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            'type' => 'vendor',
            'name' => 'Vendor Khan',
            'email' => 'vendor@vendor.com',
            'phone' => '0155000000',
            'company' => 'ABC Limited',
            'address' => '1230 Jatrabari, Dhaka',
            'bank_name' => 'Datch Bangla Bank',
            'branch_name' => 'Jatrabari',
            'account_no' => '000012002120',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => 1,
            'remember_token' => Str::random(10),
        ]);
        DB::table('vendors')->insert([
            'type' => 'vendor',
            'name' => 'Didarul Islam Akand',
            'email' => 'didarul@vendor.com',
            'phone' => '012000010',
            'company' => 'BED Limited',
            'address' => '1250 Jatrabari, Dhaka',
            'bank_name' => 'Datch Bangla Bank',
            'branch_name' => 'Jatrabari',
            'account_no' => '001222200000',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
