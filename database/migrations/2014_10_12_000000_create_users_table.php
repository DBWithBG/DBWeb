<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('facebook_id')->unique()->nullable();
            $table->string('twitter_id')->unique()->nullable();
            $table->string('google_id')->unique()->nullable();
            $table->string('mobile_token')->nullable();
            $table->boolean('admin')->default(0);
            $table->boolean('is_confirmed')->default(0);
            $table->string('email_confirmation_token')->nullable();
            $table->string('notify_token')->nullable();
            $table->string('lang')->default('en');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
