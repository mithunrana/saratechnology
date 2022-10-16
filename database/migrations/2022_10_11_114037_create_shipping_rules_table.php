<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_rules', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->integer('shipping_id')->default(0)->unsigned()->nullable();
            $table->string('type', 120)->default('base_on_price')->nullable();
            $table->integer('currency_id')->unsigned()->nullable();
            $table->decimal('from', 15,4)->default(0)->nullable();
            $table->decimal('to', 15,4)->default(0)->nullable();
            $table->decimal('price', 15,4)->default(0)->nullable();
            $table->integer('isdefault')->default(0)->unsigned()->nullable();
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
        Schema::dropIfExists('shipping_rules');
    }
}
