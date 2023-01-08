<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('blog_post_id')->unsigned()->nullable();
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('blog_comment_id')->unsigned()->nullable();
            $table->foreign('blog_comment_id')->references('id')->on('blog_comments')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('comment');
            $table->string('status', 60)->default('published');
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
        Schema::dropIfExists('blog_comments');
    }
}
