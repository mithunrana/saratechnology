<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_features', function (Blueprint $table) {
            $table->id();
            $table->string('icon', 250)->nullable();
            $table->string('title', 250)->nullable();
            $table->string('content', 250)->nullable();
            $table->string('order', 250)->nullable();
            $table->string('status', 60)->default('published');
            $table->tinyInteger('is_featured')->unsigned()->default(0);
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
        Schema::dropIfExists('our_features');
    }
}
