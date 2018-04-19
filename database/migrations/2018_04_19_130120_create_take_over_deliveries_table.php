<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTakeOverDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('take_over_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->nullable();

            $table->timestamps();


            $table->integer('driver_id')->unsigned();
            $table->integer('deliverie_id')->unsigned();
            $table->integer('actual_position_id')->unsigned();


        });

        Schema::table('take_over_deliveries', function(Blueprint $table){
            $table->foreign('actual_position_id')->references('id')->on('positions');
        });

        Schema::table('take_over_deliveries', function(Blueprint $table){
            $table->foreign('deliverie_id')->references('id')->on('deliveries');
        });

        Schema::table('take_over_deliveries', function(Blueprint $table){
            $table->foreign('driver_id')->references('id')->on('drivers');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('take_over_deliveries');
    }
}
