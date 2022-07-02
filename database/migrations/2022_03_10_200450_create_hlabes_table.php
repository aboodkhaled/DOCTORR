<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHlabesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hlabes', function (Blueprint $table) {
            $table->id();
            $table->string('lab_name');
            $table->string('axam_name');
            $table->double('price');
            $table->boolean('active');
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
        Schema::dropIfExists('hlabes');
    }
}
