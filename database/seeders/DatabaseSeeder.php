<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Admin::factory()->create();
        \App\Models\Importer::factory()->create();
        \App\Models\Merchant::factory()->create();
        $this->call(BrandSeeder::class);
        $this->call(VendorSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(Attribute_valueSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderDetailsSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(DeliveryMethodSeeder::class);
        $this->call(WithdrawSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(Product_categorySeeder::class);
        $this->call(SocialLinkSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(ShopPaymentMethodSeeder::class);
        $this->call(SubscriptionSeeder::class);

    }
}
