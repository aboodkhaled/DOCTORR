<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->enum('sex', ['male', 'female'])->default('male');
            $table->enum('sik_typ', ['external', 'internal'])->default('external');
            $table->enum('socia', ['marride', 'single'])->default('marride');
            $table->date('sdate');
            $table->string('sik_ref');
            $table->string('ref_name');
            $table->string('sik_des');
            $table->string('mobile');
            $table->string('age');
            $table->string('blood_id');
            $table->string('ref_mobile');
            $table->string('photo');
            $table->string('address');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('siks');
    }
}
