<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogWithTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_with_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blog_id')->unsigned();
            $table->bigInteger('blog_tag_id')->unsigned();
            $table->foreign('blog_id')->references('id')->on('blog_posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('blog_tag_id')->references('id')->on('blog_tags')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('blog_with_tag');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
