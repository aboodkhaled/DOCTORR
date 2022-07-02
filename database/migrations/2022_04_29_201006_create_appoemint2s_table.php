<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoemint2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoemint2s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('serve2_id');
            $table->bigInteger('serve2_price_id');
            $table->bigInteger('serve2_thin_id');
            $table->bigInteger('serve2_total_id');
            $table->bigInteger('serve2_tprice_id');
            $table->date('date');
            $table->text('reson');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('appoemint2s');
    }
}
