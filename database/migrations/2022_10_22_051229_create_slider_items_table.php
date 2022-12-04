<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('slider_id')->unsigned();
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title', 255)->nullable();
            $table->string('button_text', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('background', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->unsigned()->default(0);
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
        Schema::dropIfExists('slider_items');
    }
}
