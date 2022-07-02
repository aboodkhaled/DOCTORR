<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdoctors', function (Blueprint $table) {
            $table->id();
         
            $table->string('doc_name');
            $table->text('doc_degry');
            $table->enum('sex', ['male', 'female'])->default('male');
            $table->text('doc_des');
            $table->string('email');
            $table->string('password');
            $table->string('mobile')->unique();
           
            $table->date('perth_date');
            $table->bigInteger('fcuontry_id');
            $table->bigInteger('fcity_id');
            $table->string('address');
            $table->bigInteger('fspecialty_id');
            $table->bigInteger('fdepartment_id');
           
            $table->string('photo');
            $table->boolean('active');
            $table->bigInteger('fhosbital_id')->unsigned();
            $table->foreign('fhosbital_id')->references('id')->on('fhosbitals')->onDelete('cascade');
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
        Schema::dropIfExists('fdoctors');
    }
}
