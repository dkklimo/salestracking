<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('itemstocked');
            $table->integer('stockquantity');
            $table->integer('stockamount');
            $table->integer('stockprice');
            $table->integer('saleprice');
            $table->integer('profits');

            ///////////FK//////////
            $table->integer('fkuser')->unsigned();
            $table->foreign('fkuser')->references('id')->on('users');
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
        Schema::dropIfExists('stocks');
    }
}
