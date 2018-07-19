<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment')->nullable();
            $table->double('price', 10,2);
            $table->timestamps();
            $table->integer('status')->nullable();
            $table->double('distance')->nullable();
            $table->integer('estimated_time')->nullable();
            $table->dateTime('start_date');
            $table->time('time_consigne')->nullable();
            $table->integer('start_position_id')->unsigned();
            $table->integer('end_position_id')->unsigned();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('no_train')->nullable();
            $table->string('no_flight')->nullable();
            $table->boolean('deleted')->default(0);
        });

        Schema::table('deliveries', function(Blueprint $table){
            $table->foreign('customer_id')->references('id')->on('customers');
        });

        Schema::table('deliveries', function(Blueprint $table){
            $table->foreign('end_position_id')->references('id')->on('positions');
        });

        Schema::table('deliveries', function(Blueprint $table){
            $table->foreign('start_position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
