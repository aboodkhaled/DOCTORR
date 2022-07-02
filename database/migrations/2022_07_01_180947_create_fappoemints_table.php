<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFappoemintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fappoemints', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('fdoctor_id');
            $table->bigInteger('fdepartment_id');
            $table->bigInteger('fspecialty_id');
            $table->bigInteger('fdoctor_serve_id');
            $table->bigInteger('fserve_id');
            $table->date('adate');
            $table->text('reson');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('fappoemints');
    }
}
