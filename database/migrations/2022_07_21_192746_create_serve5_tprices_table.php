<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServe5TpricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serve5_tprices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serve5_id');
            $table->integer('thin_price')->nullable();
            $table->bigInteger('clinic_id')->unsigned();
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
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
        Schema::dropIfExists('serve5_tprices');
    }
}
