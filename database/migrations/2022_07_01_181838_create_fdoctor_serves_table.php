<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdoctorServesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdoctor_serves', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serve_id');
            $table->bigInteger('fdoctor_id');
            $table->double('price');
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('fdoctor_serves');
    }
}
