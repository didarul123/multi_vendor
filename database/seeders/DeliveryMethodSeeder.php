<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_methods')->insert([
            'name' => 'Shundorban Express',
            'price' => 100,
            'heading' => 'Shundorban Express',
            'status' => '1'
        ]);
        DB::table('delivery_methods')->insert([
            'name' => 'Bandarban Express',
            'price' => 100,
            'heading' => 'Bandarban Express',
            'status' => '1'
        ]);
    }
}
