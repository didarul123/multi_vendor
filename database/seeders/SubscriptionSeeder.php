<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'email' => 'niloyakhandniloy@gmail.com',
        ]);
        DB::table('subscriptions')->insert([
            'email' => 'bed@gmail.com',
        ]);
        DB::table('subscriptions')->insert([
            'email' => 'abc@gmail.com',
        ]);
        DB::table('subscriptions')->insert([
            'email' => 'ashok@gmail.com',
        ]);
        DB::table('subscriptions')->insert([
            'email' => 'kabir011@gmail.com',
        ]);
    }
}
