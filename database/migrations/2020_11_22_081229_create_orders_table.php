<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id')->nullable();
            $table->integer('invoice_id');
            $table->integer('customer_id')->nullable();
            $table->integer('total_qty');
            $table->integer('total_cost');
            $table->integer('payment_method');
            $table->string('transaction_id');
            $table->text('shipping_address');
            $table->string('city');
            $table->integer('postcode');
            $table->string('country');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
