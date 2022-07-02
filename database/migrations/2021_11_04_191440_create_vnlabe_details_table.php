<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVnlabeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnlabe_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('venlabe_id')->unsigned();
            $table->string('admin');
            $table->decimal('sup_price',14,3);
            $table->decimal('suppay_price',14,3);
            $table->time('pay_time');
            $table->date('pay_date');
            $table->foreign('venlabe_id')->references('id')->on('venlabes')->onDelete('cascade');
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
        Schema::dropIfExists('vnlabe_details');
    }
}
