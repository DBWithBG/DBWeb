<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBagsInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos_bags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('details_start_driver')->nullable();
            $table->string('details_end_driver')->nullable();
            $table->string('details_start_customer')->nullable();
            $table->string('details_end_customer')->nullable();
            $table->integer('rating_start_driver')->nullable();
            $table->integer('rating_end_driver')->nullable();
            $table->integer('rating_start_customer')->nullable();
            $table->integer('rating_end_customer')->nullable();
            $table->integer('delivery_id')->unsigned();
            $table->integer('bag_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('infos_bags', function(Blueprint $table){
            $table->foreign('delivery_id')->references('id')->on('deliveries');
        });
        Schema::table('infos_bags', function(Blueprint $table){
            $table->foreign('bag_id')->references('id')->on('bags');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos_bags');
    }
}
