<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            'id' => 1,
            'product_id' => 1,
            'category_id' => 1,
        ]);
        DB::table('product_categories')->insert([
            'id' => 2,
            'product_id' => 1,
            'category_id' => 2,
        ]);
        DB::table('product_categories')->insert([
            'id' => 3,
            'product_id' => 2,
            'category_id' => 1,
        ]);
        DB::table('product_categories')->insert([
            'id' => 4,
            'product_id' => 2,
            'category_id' => 3,
        ]);
        DB::table('product_categories')->insert([
            'id' => 5,
            'product_id' => 3,
            'category_id' => 1,
        ]);
    }
}
