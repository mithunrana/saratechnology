<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetSetWithWidgetBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_set_with_widget_bars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('widget_id')->unsigned();
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('widget_bar_id')->unsigned();
            $table->foreign('widget_bar_id')->references('id')->on('widget_bars')->onDelete('cascade')->onUpdate('cascade');
            $table->string('widgetshowname', 120)->nullable();
            $table->string('modelnamespace', 250)->nullable()->default(null);
            $table->bigInteger('menu_id')->unsigned()->nullable()->default(null);
            $table->integer('number_placement')->unsigned()->nullable()->default(0);
            $table->longText('content')->nullable()->default(null);
            $table->bigInteger('order')->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('widget_set_with_widget_bars');
    }
}
