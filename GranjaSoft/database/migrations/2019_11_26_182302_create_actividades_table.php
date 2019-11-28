<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('empleado_id')->unsigned();
            $table->string('tipo_de_tarea');
            $table->date('fecha_de_inicio')->nullable();
            $table->date('fecha_de_finalizacion')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actividades');
    }
}
