<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_prices', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('labe_id')->unsigned();;
            $table->integer('price')->nullable();
            $table->foreign('labe_id')->references('id')->on('labes')->onDelete('cascade');
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
        Schema::dropIfExists('lab_prices');
    }
}
