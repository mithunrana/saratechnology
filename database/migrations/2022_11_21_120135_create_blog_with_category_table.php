<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogWithCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_with_category', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blog_id')->unsigned();
            $table->bigInteger('blog_category_id')->unsigned();
            $table->foreign('blog_id')->references('id')->on('blog_posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('blog_with_category');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
