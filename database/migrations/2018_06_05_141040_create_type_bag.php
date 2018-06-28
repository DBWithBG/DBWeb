<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTypeBag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_bags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->double('price', 10,2)->default('0.00');
            $table->timestamps();
        });



    }

    public function run(){
        DB::table('type_bags')->insert([
            'nom'=>"Bagage en cabine",
            'length'=>0,
            'width'=>0,
            'height'=>0
        ]);
        DB::table('type_bags')->insert([
            'nom'=>"Bagage en soute",
            'length'=>0,
            'width'=>0,
            'height'=>0
        ]);
        DB::table('type_bags')->insert([
            'nom'=>"Autres",
            'length'=>0,
            'width'=>0,
            'height'=>0
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_bags');
    }
}
