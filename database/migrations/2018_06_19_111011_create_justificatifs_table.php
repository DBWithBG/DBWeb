<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJustificatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justificatifs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedInteger('driver_id');
            $table->boolean('is_valide')->nullable();
            $table->timestamps();
        });

        Schema::table('justificatifs', function(Blueprint $table){
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
        Schema::table('justificatifs', function(Blueprint $table) {
            $table->dropForeign('justificatifs_driver_id_foreign');
        });

        Schema::dropIfExists('justificatifs');
    }
}
