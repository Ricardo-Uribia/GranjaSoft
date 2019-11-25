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
            $table->bigInteger('activida_id')->unsigned();
            $table->string('nombre')->nullable();
            $table->string('empleado')->nullable();
            $table->string('actividad')->nullable();
            $table->string('dia')->nullable();
            $table->string('hora_inicio')->nullable();
            $table->string('hora_finaliza')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleado')->onDelete('cascade')->onUpdate('cascade');
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
