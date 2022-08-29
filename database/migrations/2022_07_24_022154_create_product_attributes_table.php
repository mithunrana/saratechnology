<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('attribute_set_id')->unsigned();
            $table->string('title', 120);
            $table->string('slug', 120)->nullable()->default(null);
            $table->string('color', 50)->nullable()->default(null);
            $table->tinyInteger('is_default')->unsigned()->default(0);
            $table->tinyInteger('order')->nullable()->unsigned()->default(0);
            $table->string('status', 60)->default('published');
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
        Schema::dropIfExists('product_attributes');
    }
}
