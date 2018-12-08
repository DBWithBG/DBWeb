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
            $table->boolean('is_online')->default(0);
            $table->string('phone')->nullable();
            $table->string('siret')->nullable();
            $table->boolean('is_op')->default(0);//Si le siret && et les différentes pièces sont OK
            $table->timestamps();
            $table->boolean('deleted')->default(0);
            $table->float('current_lat', 10,6)->nullable();
            $table->float('current_lng', 10,6)->nullable();
            $table->integer('canceled_deliveries')->default(0);
            $table->integer('max_bags')->default(3);

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
