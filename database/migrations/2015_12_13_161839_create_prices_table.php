<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string("createur")->nullable();
            $table->integer('bags_min')->nullable();
            $table->integer('bags_max')->nullable();
            $table->decimal('to_add_driver',10,6)->nullbale();
            $table->decimal('coef_kilometers_driver',10,6)->nullable();
            $table->decimal('coef_bags_driver',10,6)->nullable();
            $table->decimal('coef_total_driver',10,6)->nullable();
            $table->decimal('coef_deliver',10,6)->nullable();
            $table->decimal('to_add_retour', 10, 6)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('promotion')->nullable();
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
        Schema::dropIfExists('prices');
    }
}
