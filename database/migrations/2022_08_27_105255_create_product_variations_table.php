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
            $table->bigInteger('products_id')->unsigned();
            $table->string('sku', 191)->default(null)->nullable();
            $table->integer('quantity')->default(null)->nullable();
            $table->tinyInteger('allow_checkout_when_out_of_stock')->default(0);
            $table->tinyInteger('with_storehouse_management')->default(0);
            $table->double('price',12,4)->nullable()->unsigned()->default(0.00);
            $table->double('sale_price',12,4)->nullable()->unsigned()->default(0.00);
            $table->double('length',12,4)->nullable()->default(0);
            $table->double('wide',12,4)->nullable()->unsigned()->default(0.00);
            $table->double('height',12,4)->nullable()->default(0);
            $table->decimal('weight',15,2)->nullable()->unsigned()->default(0);
            $table->string('barcode', 191)->nullable()->default(null);
            $table->timestamp('discount_start_date')->nullable();
            $table->timestamp('discount_end_date')->nullable();
            $table->string('length_unit', 20)->nullable()->default(null);
            $table->string('wide_unit', 20)->nullable()->default(null);
            $table->string('height_unit', 20)->nullable()->default(null);
            $table->string('weight_unit', 20)->nullable()->default(null);
            $table->tinyInteger('is_default')->default(0);
            $table->string('stock_status', 191)->default('in_stock');
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
        //Schema::dropIfExists('product_variations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('product_variations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
