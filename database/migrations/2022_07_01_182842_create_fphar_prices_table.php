<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFpharPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fphar_prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fpharmice_id');
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
        Schema::dropIfExists('fphar_prices');
    }
}
