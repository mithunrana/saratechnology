<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationWithAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variation_with_attribute', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_variation_id')->unsigned();
            $table->bigInteger('product_attribute_id')->unsigned();
            $table->bigInteger('product_attribute_set_id')->unsigned();
            $table->bigInteger('products_id')->unsigned();
            $table->foreign('product_variation_id')->references('id')->on('product_variations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_attribute_set_id')->references('id')->on('product_attribute_sets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('variation_with_attribute');
    }
}
