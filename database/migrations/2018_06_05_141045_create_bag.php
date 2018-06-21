<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('details')->nullable();
            $table->integer('type_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::table('bags', function(Blueprint $table){
            $table->foreign('type_id')->references('id')->on('type_bags');
        });
        Schema::table('bags', function(Blueprint $table){
            $table->foreign('customer_id')->references('id')->on('customers');
        });

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bags');
    }
}
