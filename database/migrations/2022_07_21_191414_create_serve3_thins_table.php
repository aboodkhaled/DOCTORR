<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServe3ThinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serve3_thins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serve3_id');
            $table->string('think');
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
        Schema::dropIfExists('serve3_thins');
    }
}
