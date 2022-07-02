<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHappoemintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('happoemints', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('hdoctor_id');
            $table->bigInteger('hdepartment_id');
            $table->bigInteger('hspecialty_id');
            $table->bigInteger('hdoctor_serve_id');
            $table->bigInteger('hserve_id');
            $table->date('adate');
            $table->text('reson');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('happoemints');
    }
}
