<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->integer('author_id')->nullable();
            $table->string('author_type', 255)->nullable()->default('');
            
            $table->string('permalink', 255)->default(null);
            $table->string('seotitle')->nullable()->default(null);
            $table->text('metakeyword')->nullable()->default(null);
            $table->text('metadescription')->default(null)->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('blog_tags');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
