<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('surname')->prenom();
            $table->date('birth_date')->nullable();
            $table->boolean('is_online');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->boolean('deleted')->default(0);


            $table->integer('user_id')->unsigned();

        });

        Schema::table('drivers', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
