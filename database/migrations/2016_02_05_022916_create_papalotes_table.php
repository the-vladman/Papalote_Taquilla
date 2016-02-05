<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapalotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papalotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('nombre');
            $table->integer('edad');
            $table->enum('genero',['M','F']);
            $table->string('url_perfil');
            $table->timestamp('fecha_visita');
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
        Schema::drop('papalotes');
    }
}
