<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreditsTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rode');
            $table->integer('nDues');
            $table->integer('interest');
            $table->integer('client_id')->unsigned();
            $table->integer('typeCredit_id')->unsigned();
            $table->integer('period_id')->unsigned();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('typeCredit_id')->references('id')->on('typeCredits');
            $table->foreign('period_id')->references('id')->on('periods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('credists');
    }
}
