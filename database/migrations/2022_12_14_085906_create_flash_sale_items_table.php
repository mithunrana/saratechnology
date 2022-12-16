<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flash_sale_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('flash_sale_id')->unsigned();
            $table->foreign('flash_sale_id')->references('id')->on('flash_sales')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->double('price')->unsigned()->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->integer('sold')->unsigned()->default(0);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('flash_sale_items');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
