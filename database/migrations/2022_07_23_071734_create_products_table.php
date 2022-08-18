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
            $table->string('name', 191);
            $table->text('description')->default(null)->nullable();
            $table->longText('content')->default(null);
            $table->string('status', 60)->default('published');
            $table->text('images')->default(null)->nullable();
            $table->string('sku', 191)->default(null)->nullable();
            $table->integer('order')->default(0);
            $table->integer('quantity')->default(null)->nullable();
            $table->tinyInteger('allow_checkout_when_out_of_stock')->default(0);
            $table->tinyInteger('with_storehouse_management')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->text('options')->default(null);
            $table->integer('category_id')->default(null);
            $table->integer('brand_id')->default(null);
            $table->tinyInteger('is_variation')->default(0);
            $table->tinyInteger('is_searchable')->default(0);
            $table->tinyInteger('is_show_on_list')->default(0);
            $table->tinyInteger('sale_type')->default(0);
            $table->double('price', 15, 8)->default(null);
            $table->double('sale_price', 15, 8)->default(null);
            $table->timestamp('start_date')->nullable()->default(null);
            $table->timestamp('end_date')->nullable()->default(null);
            $table->double('length',12,4)->default(null);
            $table->double('wide',12,4)->unsigned()->default(null);
            $table->double('height',12,4)->default(null);
            $table->decimal('weight',15,2)->unsigned()->default(null)->nullable();
            $table->string('barcode', 191)->default(null);
            $table->string('length_unit', 20)->default(null);
            $table->string('wide_unit', 20)->default(null);
            $table->string('height_unit', 20)->default(null);
            $table->string('weight_unit', 20)->default(null);
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);
            $table->integer('tax_id')->default(null);
            $table->bigInteger('views')->default(0);
            $table->string('stock_status', 191)->default('in_stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
