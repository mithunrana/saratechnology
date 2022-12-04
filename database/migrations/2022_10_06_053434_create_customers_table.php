<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar', 255)->nullable();
            $table->date('dob')->nullable();
            $table->string('phone', 25)->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();

            #this is extra field for email verification check
            $table->boolean('is_email_verified')->default(0);

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
        Schema::dropIfExists('customers');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
