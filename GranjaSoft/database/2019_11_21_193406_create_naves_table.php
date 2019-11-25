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
            $table->bigInteger('nave_id')->unsigned();
            $table->integer('secciones')->nullable();
            $table->foreign('nave_id')->references('id')->on('granja')->onDelete('cascade')->onUpdate('cascade');
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
