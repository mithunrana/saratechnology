<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_collections', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->longText('description', 400)->nullable()->default(null);
            $table->string('image', 255)->nullable()->default(null);
            $table->string('status', 60)->default('published');
            $table->tinyInteger('order')->nullable()->unsigned()->default(0);
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);
            $table->tinyInteger('is_featured')->unsigned()->default(0);
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
        Schema::dropIfExists('product_collections');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
