<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServe4TotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serve4_totals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serve4_id');
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('serve4_totals');
    }
}
