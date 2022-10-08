<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191)->default(null);
            $table->string('permalink', 250)->default(null);
            $table->string('title',250)->nullable()->default(null);
            $table->text('metakeyword')->nullable()->default(null);
            $table->text('metadescription')->default(null)->nullable();
            $table->text('description')->nullable()->default(null);
            $table->longText('content')->nullable()->default(null);
            $table->string('status', 60)->default('published');
            $table->text('images')->nullable()->default(null);
            $table->integer('order')->unsigned()->default(0);
            $table->tinyInteger('is_featured')->unsigned()->default(0);

            //Product Initial Info For Variation Purpose

            $table->string('sku', 191)->default(null)->nullable();
            $table->integer('quantity')->default(null)->nullable();
            $table->tinyInteger('allow_checkout_when_out_of_stock')->default(0);
            $table->tinyInteger('with_storehouse_management')->default(0);
            $table->double('price',12,4)->nullable()->unsigned();
            $table->double('sale_price',12,4)->nullable()->unsigned();
            $table->double('length',12,4)->nullable()->default(null);
            $table->double('wide',12,4)->nullable()->unsigned()->default(null);
            $table->double('height',12,4)->nullable()->default(null);
            $table->decimal('weight',15,2)->nullable()->unsigned()->default(null);
            $table->string('barcode', 191)->nullable()->default(null);
            $table->timestamp('discount_start_date')->nullable();
            $table->timestamp('discount_end_date')->nullable();
            $table->string('length_unit', 20)->nullable()->default(null);
            $table->string('wide_unit', 20)->nullable()->default(null);
            $table->string('height_unit', 20)->nullable()->default(null);
            $table->string('weight_unit', 20)->nullable()->default(null);
            $table->string('stock_status', 191)->default('in_stock');
            
            //Product Initial Info For Variation Purpose


            $table->text('options')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->tinyInteger('is_variation')->default(0);
            $table->tinyInteger('is_searchable')->default(0);
            $table->tinyInteger('is_show_on_list')->default(0);
            $table->tinyInteger('sale_type')->default(0);
            $table->integer('tax_id')->default(null);
            $table->bigInteger('views')->nullable()->default(0);
            $table->string('imagealttext', 250)->nullable()->default(null);
            $table->string('imagetitletext', 250)->nullable()->default(null);
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('products');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('products');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
