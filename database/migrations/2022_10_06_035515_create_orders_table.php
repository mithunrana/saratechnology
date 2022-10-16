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
            $table->integer('customer_id')->default(0)->unsigned();
            $table->string('shipping_option', 60)->nullable();
            $table->bigInteger('shipping_method')->unsigned();
            $table->foreign('shipping_method')->references('id')->on('shipping_rules')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status', 120)->default('pending');
            $table->decimal('amount', 15,4)->default(0)->nullable();
            $table->bigInteger('currency_id')->unsigned();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('tax_amount',15,4)->default(0)->nullable();
            $table->decimal('shipping_amount',15,4)->default(0)->nullable();
            $table->text('description')->nullable();
            $table->string('coupon_code', 120)->nullable();
            $table->decimal('discount_amount', 15,4)->default(0)->nullable();
            $table->decimal('sub_total', 15,4)->default(0)->nullable();
            $table->boolean('is_confirmed')->default(false);
            $table->string('discount_description', 255)->nullable();
            $table->boolean('is_finished')->default(1)->nullable();
            $table->string('token', 120)->nullable();
            $table->integer('payment_id')->unsigned()->nullable();
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
