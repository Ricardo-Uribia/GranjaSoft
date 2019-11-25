<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('empleado_id')->unsigned();
            $table->string('nombre')->nullable();
            $table->integer('edad')->nullable();
            $table->string('puesto')->nullable();
            $table->string('actividades')->nullable();
            $table->foreign('empleado_id')->references('id')->on('granja')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
