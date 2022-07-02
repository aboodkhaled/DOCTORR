<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVnpharmiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnpharmice_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('venpharmice_id')->unsigned();
            $table->string('admin');
            $table->decimal('sup_price',14,3);
            $table->decimal('suppay_price',14,3);
            $table->time('pay_time');
            $table->date('pay_date');
          
            $table->foreign('venpharmice_id')->references('id')->on('venpharmices')->onDelete('cascade');
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
        Schema::dropIfExists('vnpharmice_details');
    }
}
