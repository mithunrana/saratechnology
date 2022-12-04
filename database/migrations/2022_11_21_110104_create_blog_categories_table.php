<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->integer('parent_id')->unsigned()->nullable()->default(0);
            $table->string('status', 60)->default('published');
            $table->integer('author_id')->nullable();
            $table->string('author_type', 255)->nullable();
            $table->string('icon', 60)->nullable();
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_default')->nullable()->unsigned()->default(0);

            $table->string('permalink', 255)->default(null);
            $table->string('seotitle')->nullable()->default(null);
            $table->text('metakeyword')->nullable()->default(null);
            $table->text('metadescription')->default(null)->nullable();
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
        Schema::dropIfExists('blog_categories');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
