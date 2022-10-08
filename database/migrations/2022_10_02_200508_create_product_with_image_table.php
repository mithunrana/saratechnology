<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductWithImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_with_image', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('products_id')->unsigned();
            $table->bigInteger('media_file_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('media_file_id')->references('id')->on('media_files')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('product_with_image');
    }
}
