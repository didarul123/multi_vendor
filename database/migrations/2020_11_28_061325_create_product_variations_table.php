<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('var_attribute_id')->nullable();
            $table->integer('var_attribute_value_id')->nullable();
            $table->integer('var_attribute_id2')->nullable();
            $table->integer('var_attribute_value_id2')->nullable();
            $table->string('var_price')->nullable();
            $table->string('var_img')->nullable();
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
        Schema::dropIfExists('product_variations');
    }
}
