<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produt_brands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->longText('description')->nullable()->default(null);
            $table->string('website', 255)->nullable()->default(null);
            $table->string('logo', 255)->nullable()->default(null);
            $table->string('status', 60)->default('published');
            $table->tinyInteger('order')->unsigned()->default(0);
            $table->tinyInteger('is_featured')->unsigned()->default(0);
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
        Schema::dropIfExists('produt_brands');
    }
}
