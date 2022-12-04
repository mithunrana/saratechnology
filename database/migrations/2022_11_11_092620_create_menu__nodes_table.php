<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu__nodes', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('parent_id')->default(0)->unsigned()->index();
            $table->integer('reference_id')->unsigned()->nullable();
            $table->string('reference_type', 255)->nullable();
            $table->string('url', 120)->nullable();
            $table->string('icon_font', 50)->nullable();
            $table->tinyInteger('position')->unsigned()->default(0);
            $table->string('title', 120)->nullable();
            $table->string('css_class', 120)->nullable();
            $table->string('dropdownmega', 120)->nullable();
            $table->string('target', 20)->default('_self');
            $table->tinyInteger('has_child')->unsigned()->default(0);
            $table->bigInteger('order')->unsigned()->default(0);
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
        Schema::dropIfExists('menu__nodes');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
