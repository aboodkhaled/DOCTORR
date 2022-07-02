<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFxPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fx_prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fxray_id');
            $table->integer('price')->nullable();
            $table->bigInteger('fhosbital_id')->unsigned();
            $table->foreign('fhosbital_id')->references('id')->on('fhosbitals')->onDelete('cascade');
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
        Schema::dropIfExists('fx_prices');
    }
}
