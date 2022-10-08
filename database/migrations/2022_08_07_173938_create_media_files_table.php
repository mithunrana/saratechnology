<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->references('id')->on('users')->index();
            $table->string('name', 255)->nullable();
            $table->integer('folder_id')->default(0)->unsigned();
            $table->string('mime_type', 120)->nullable();
            $table->integer('size')->nullable();
            $table->string('extension', 255)->nullable();
            $table->string('urlwithoutextension', 255);
            $table->string('url', 255);
            $table->text('options')->nullable();
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
        Schema::dropIfExists('media_files');
    }
}
