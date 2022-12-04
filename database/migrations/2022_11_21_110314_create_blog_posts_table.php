<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->longText('content')->nullable();
            $table->string('status', 60)->default('published');

            $table->integer('author_id')->nullable();
            $table->string('author_type', 255)->nullable();
            
            $table->tinyInteger('is_featured')->unsigned()->default(0);
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->string('format_type', 30)->nullable();

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
        Schema::dropIfExists('blog_posts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
