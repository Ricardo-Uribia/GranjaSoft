<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naves', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('nave_id')->unsigned();
            $table->integer('secciones')->nullable();
            $table->string('tipo_de_nave')->nullable();
            $table->string('status')->nullable();
            $table->foreign('nave_id')->references('id')->on('granjas')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('naves');
    }
}
