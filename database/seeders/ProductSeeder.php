<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'admin_id' => 1,
            'vendor_id' => Null,
            'merchant_id' => Null,
            'importer_id' => Null,
            'brand_id' => 5,
            'name' => 'Man Shoe',
            'slug' => 'man-Shoe',
            'sku' => '13300_114500',
            'barcode' => '',
            'description' => 'Nick Man Shoe',
            'specification' => 'Nick Man Shoe',
            'image' => '',
            'max_order_qty' => '',
            'min_order_qty' => '',
            'buying_price' => '1000',
            'market_price' => '1500',
            'sell_price' => '1200',
            'qty' => '20',
            'note' => 'Nick Man Shoe',
            'status' => 1
        ]);
        DB::table('products')->insert([
            'admin_id' => 1,
            'vendor_id' => 1,
            'merchant_id' => Null,
            'importer_id' => Null,
            'brand_id' => 5,
            'name' => 'Woman Shoe',
            'slug' => 'woman-Shoe',
            'sku' => '13300_114500',
            'barcode' => '',
            'description' => 'Nick Woman Shoe',
            'specification' => 'Nick Woman Shoe',
            'image' => '',
            'max_order_qty' => '',
            'min_order_qty' => '',
            'buying_price' => '1000',
            'market_price' => '1500',
            'sell_price' => '1200',
            'qty' => '20',
            'note' => 'Nick Woman Shoe',
            'status' => 1
        ]);
        DB::table('products')->insert([
            'admin_id' => 1,
            'vendor_id' => Null,
            'merchant_id' => 1,
            'importer_id' => Null,
            'brand_id' => 5,
            'name' => 'Babay Shoe',
            'slug' => 'Babay-shoe',
            'sku' => '13300_114500',
            'barcode' => '',
            'description' => 'Babay Woman Shoe',
            'specification' => 'Babay Woman Shoe',
            'image' => '',
            'max_order_qty' => '',
            'min_order_qty' => '',
            'buying_price' => '1000',
            'market_price' => '1500',
            'sell_price' => '1200',
            'qty' => '20',
            'note' => 'Babay Woman Shoe',
            'status' => 1
        ]);
    }
}
