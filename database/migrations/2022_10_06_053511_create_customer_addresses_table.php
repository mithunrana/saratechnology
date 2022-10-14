<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 60)->nullable();
            $table->string('phone');
            $table->integer('country')->unsigned()->nullable();
            $table->string('state', 120)->nullable();
            $table->integer('city')->unsigned()->nullable();
            $table->string('address');
            $table->integer('customer_id')->unsigned();
            $table->tinyInteger('is_default')->default(0)->unsigned();
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
        Schema::dropIfExists('customer_addresses');
    }
}
