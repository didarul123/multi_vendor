<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'Oberlo',
            'slug' => 'oberlo',
            'brand_logo' => '',
            'status' => '1'
        ]);
        DB::table('brands')->insert([
            'name' => 'Shopify',
            'slug' => 'shopify',
            'brand_logo' => '',
            'status' => '1'
        ]);
        DB::table('brands')->insert([
            'name' => 'London Britches',
            'slug' => 'londonbritches',
            'brand_logo' => '',
            'status' => '1'
        ]);
        DB::table('brands')->insert([
            'name' => 'Hendrix',
            'slug' => 'hendrix',
            'brand_logo' => '',
            'status' => '1'
        ]);
        DB::table('brands')->insert([
            'name' => 'Nike',
            'slug' => 'nike',
            'brand_logo' => '',
            'status' => '1'
        ]);
        DB::table('brands')->insert([
            'name' => 'Marika',
            'slug' => 'marika',
            'brand_logo' => '',
            'status' => '1'
        ]);
        DB::table('brands')->insert([
            'name' => 'Uniqlo',
            'slug' => 'uniqlo',
            'brand_logo' => '',
            'status' => '1'
        ]);
        
    }

    

}
