<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacunas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('vacuna_id')->unsigned();
            $table->string('nombre')->nullable();
            $table->string('tipo')->nullable();
            $table->date('caducidad')->nullable();
            $table->foreign('vacuna_id')->references('id')->on('animales')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vacunas');
    }
}
