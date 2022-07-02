<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hserves', function (Blueprint $table) {
            $table->id();
            $table->string('serv_name');
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
        Schema::dropIfExists('hserves');
    }
}
