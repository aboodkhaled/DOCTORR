<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foperations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('fappoemint_id')->references('id')->on('fappoemints')->onDelete('cascade');
            $table->string('status');
            $table->integer('confirm_id');
            $table->integer('operation_id');
            $table->boolean('active');
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
        Schema::dropIfExists('foperations');
    }
}
