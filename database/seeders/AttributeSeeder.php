<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            'name' => 'Color',
            'slug' => 'color',
            'discription' => 'Color',
            'status' => '1',
        ]);
        DB::table('attributes')->insert([
            'name' => 'Size',
            'slug' => 'size',
            'discription' => 'Size',
            'status' => '1',
        ]);
        DB::table('attributes')->insert([
            'name' => 'Unit',
            'slug' => 'unit',
            'discription' => 'Unit',
            'status' => '1',
        ]);
    }
}
