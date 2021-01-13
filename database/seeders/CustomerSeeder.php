<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'first_name' => 'Didarul Islam',
            'last_name' => 'Akand',
            'email' => 'didarul@gmail.com',
            'phone' => '01777919189',
            'address' => 'Jatrabari, Dhaka',
            'post_code' => '1320',
            'city' => 'Dhaka',
            'country' => 'Bangladesh',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => '1',
        ]);
        DB::table('customers')->insert([
            'first_name' => 'Niloy',
            'last_name' => 'Akand',
            'email' => 'niloy@gmail.com',
            'phone' => '01787711101',
            'address' => 'Jatrabari, Dhaka',
            'post_code' => '1320',
            'city' => 'Dhaka',
            'country' => 'Bangladesh',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => '1',
        ]);
        DB::table('customers')->insert([
            'first_name' => 'Fariya',
            'last_name' => 'Khan',
            'email' => 'fariya@gmail.com',
            'phone' => '0124000000',
            'address' => 'Shylet Shadar, Shylet',
            'post_code' => '1450',
            'city' => 'Shylet',
            'country' => 'Bangladesh',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => '1',
        ]);
    }
}
