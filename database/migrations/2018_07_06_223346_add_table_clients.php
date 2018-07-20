<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_id')->unsigned();
            $table->integer('wallet_id')->unsigned();
            $table->integer('guarantor_id')->unsigned();

            $table->foreign('data_id')->references('id')->on('data')->onDelete('cascade');
            $table->foreign('wallet_id')->references('id')->on('wallets');
            $table->foreign('guarantor_id')->references('id')->on('guarantors');

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
        Schema::drop('clients');
    }
}
