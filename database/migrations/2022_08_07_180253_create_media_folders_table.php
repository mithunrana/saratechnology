<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_folders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->references('id')->on('users')->index();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('parent_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_folders');
    }
}
