<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFhosbitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fhosbitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('photo');
            $table->string('password');
            $table->string('mobile')->unique();
            $table->boolean('active');
            $table->date('sup_date');
            $table->decimal('sup_price',14,3);
            $table->decimal('suppay_price',14,3);
            $table->time('pay_time');
            $table->date('pay_date');
            $table->boolean('status');
            $table->bigInteger('cuontry_id');
            $table->bigInteger('city_id');
            $table->string('address');
            $table->bigInteger('hadmin_id');
            $table->text('des');
            $table->rememberToken();
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
        Schema::dropIfExists('fhosbitals');
    }
}
