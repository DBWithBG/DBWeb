<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingDrivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id')->unsigned();
            $table->integer('delivery_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('rating')->unsigned();
            $table->timestamps();
        });


        Schema::table('rating_drivers', function(Blueprint $table){
            $table->foreign('driver_id')->references('id')->on('drivers');
        });

        Schema::table('rating_drivers', function(Blueprint $table){
            $table->foreign('delivery_id')->references('id')->on('deliveries');
        });

        Schema::table('rating_drivers', function(Blueprint $table){
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
        Schema::dropIfExists('rating_drivers');
    }
}
