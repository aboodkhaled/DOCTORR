<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHxPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hx_prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hxray_id');
            $table->integer('price')->nullable();
            $table->bigInteger('hosbital_id')->unsigned();
            $table->foreign('hosbital_id')->references('id')->on('hosbitals')->onDelete('cascade');
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
        Schema::dropIfExists('hx_prices');
    }
}
