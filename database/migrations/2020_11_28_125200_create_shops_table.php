<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->string('owner_type');
            $table->text('name')->nullable();
            $table->text('legal_name')->nullable();
            $table->string('slug', 200)->unique();
            $table->string('email')->unique();
            $table->longtext('description')->nullable();
            $table->string('external_url')->nullable();
            $table->integer('timezone_id')->nullable();
            $table->string('current_billing_plan')->nullable();
            // $table->string('braintree_id')->nullable();
            // $table->string('paypal_email')->nullable();
            $table->string('stripe_id')->nullable();
            $table->text('card_holder_name')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();

            $table->boolean('active')->nullable()->default(0);
            $table->boolean('payment_verified')->nullable()->default(Null);
            $table->boolean('id_verified')->nullable()->default(Null);
            $table->boolean('phone_verified')->nullable()->default(Null);
            $table->boolean('address_verified')->nullable()->default(Null);
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
