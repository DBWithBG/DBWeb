<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayboxPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paybox_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount', 12, 2)->nullable();
            $table->string('payment_type', 100)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('token_identification', 100)->nullable();
            $table->unsignedInteger('delivery_id');
            $table->string('authorization_number')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('call_number')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });

        Schema::table('paybox_payments', function(Blueprint $table){
            $table->foreign('delivery_id')->references('id')->on('deliveries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paybox_payments', function(Blueprint $table) {
            $table->dropForeign('paybox_payments_id_app_foreign');
        });

        Schema::dropIfExists('paybox_payments');
    }
}
