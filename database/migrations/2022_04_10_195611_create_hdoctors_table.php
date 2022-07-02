<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHdoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hdoctors', function (Blueprint $table) {
            $table->id();
            $table->string('doc_name');
            $table->text('doc_degry');
            $table->enum('sex', ['male', 'female'])->default('male');
            $table->text('doc_des');
            $table->string('email');
            $table->string('password');
            $table->string('mobile')->unique();
           
            $table->date('perth_date');
            $table->bigInteger('cuontry_id');
            $table->bigInteger('city_id');
            $table->string('address');
            $table->bigInteger('specialty_id');
            $table->bigInteger('department_id');
           
            $table->string('photo');
            $table->boolean('active');
            $table->bigInteger('hosbital_id')->unsigned();
            $table->foreign('hosbital_id')->references('id')->on('hosbitals')->onDelete('cascade');
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
        Schema::dropIfExists('hdoctors');
    }
}
