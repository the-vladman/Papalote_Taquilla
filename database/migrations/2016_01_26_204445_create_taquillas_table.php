<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaquillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taquillas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boleto');
            $table->string('email');
            $table->string('nombre');
            $table->integer('edad');
            $table->enum('genero',['M','F']);
            $table->timestamp('fecha_visita');
            //si se pregistro ya estos datos deben estar en a base de datos
            $table->boolean('pre');
            //Si es un grupo se activa esta vbandera
            $table->boolean('encargado');
            $table->integer('tamano');
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
        Schema::drop('taquillas');
    }
}
