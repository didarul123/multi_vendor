<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Attribute_valueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_values')->insert([
            'attribute_id' => 1,
            'value' => 'Red',
            'slug' => 'color_red',
            'description' => 'Color > Red',
            'status' => '1',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => 1,
            'value' => 'Blue',
            'slug' => 'color_blue',
            'description' => 'Color > Blue',
            'status' => '1',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => 1,
            'value' => 'Black',
            'slug' => 'color_black',
            'description' => 'Color > Black',
            'status' => '1',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => 2,
            'value' => 'S',
            'slug' => 'size_s',
            'description' => 'Size > S',
            'status' => '1',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => 2,
            'value' => 'X',
            'slug' => 'size_x',
            'description' => 'Size > X',
            'status' => '1',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => 2,
            'value' => 'XL',
            'slug' => 'size_xl',
            'description' => 'Size > XL',
            'status' => '1',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => 2,
            'value' => 'XXL',
            'slug' => 'size_xxl',
            'description' => 'Size > XXL',
            'status' => '1',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => 3,
            'value' => 'KG',
            'slug' => 'unit_kg',
            'description' => 'Size > KG',
            'status' => '1',
        ]);
        DB::table('attribute_values')->insert([
            'attribute_id' => 3,
            'value' => 'Meter',
            'slug' => 'unit_meter',
            'description' => 'Size > Meter',
            'status' => '1',
        ]);
    }
}
