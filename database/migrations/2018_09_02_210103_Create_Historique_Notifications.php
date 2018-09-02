<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriqueNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->text('contenu')->nullable();
            $table->text('cible')->nullable();
            $table->string('titre')->nullable();
            $table->string('moyen')->nullable();
            $table->string('createur')->nullable();
            $table->string('status')->nullable();
            $table->integer('hits')->nullable();
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
        Schema::dropIfExists('historique_notifications');
    }
}
