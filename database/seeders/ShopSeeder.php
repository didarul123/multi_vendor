<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'owner_id' => '1',
            'owner_type' => 'vendor',
            'name' => 'Excelent Shop',
            'legal_name' => 'Excelent Shop',
            'slug' => 'excelent-shop',
            'email' => 'excelentshop@gmail.com',
            'description' => 'Excelent Shop',
            'external_url' => 'www.google.com',
            'timezone_id' => 1,
            'current_billing_plan' => '',
            'stripe_id' => 'excelentshop@gmail.com',
            'card_holder_name' => 'Excelent Shop',
            'card_brand' => 'Credit',
            'card_last_four' => 4040,
            'active' => Null,
            'payment_verified' => Null,
            'id_verified' => Null,
            'phone_verified' => Null,
            'address_verified' => Null,
        ]);

        DB::table('shops')->insert([
            'owner_id' => '2',
            'owner_type' => 'vendor',
            'name' => 'Demand Shop',
            'legal_name' => 'Demand Shop',
            'slug' => 'demand-shop',
            'email' => 'demandshop@gmail.com',
            'description' => 'Demand Shop',
            'external_url' => 'www.google.com',
            'timezone_id' => 1,
            'current_billing_plan' => '',
            'stripe_id' => 'demandshop@gmail.com',
            'card_holder_name' => 'Demand Shop',
            'card_brand' => 'Credit',
            'card_last_four' => 4040,
            'active' => Null,
            'payment_verified' => Null,
            'id_verified' => Null,
            'phone_verified' => Null,
            'address_verified' => Null,
        ]);

        DB::table('shops')->insert([
            'owner_id' => '1',
            'owner_type' => 'merchant',
            'name' => 'Merchant Shop',
            'legal_name' => 'Merchant Shop',
            'slug' => 'merchant-shop',
            'email' => 'merchantshop@gmail.com',
            'description' => 'Merchant Shop',
            'external_url' => 'www.google.com',
            'timezone_id' => 1,
            'current_billing_plan' => '',
            'stripe_id' => 'merchantshop@gmail.com',
            'card_holder_name' => 'Merchant Shop',
            'card_brand' => 'Debit',
            'card_last_four' => 1200,
            'active' => Null,
            'payment_verified' => Null,
            'id_verified' => Null,
            'phone_verified' => Null,
            'address_verified' => Null,
        ]);

        DB::table('shops')->insert([
            'owner_id' => '1',
            'owner_type' => 'importer',
            'name' => 'Importer Shop',
            'legal_name' => 'Importer Shop',
            'slug' => 'importer-shop',
            'email' => 'importershop@gmail.com',
            'description' => 'Importer Shop',
            'external_url' => 'www.google.com',
            'timezone_id' => 1,
            'current_billing_plan' => '',
            'stripe_id' => 'importershop@gmail.com',
            'card_holder_name' => 'Importer Shop',
            'card_brand' => 'Debit',
            'card_last_four' => 5500,
            'active' => Null,
            'payment_verified' => Null,
            'id_verified' => Null,
            'phone_verified' => Null,
            'address_verified' => Null,
        ]);
    }
}
