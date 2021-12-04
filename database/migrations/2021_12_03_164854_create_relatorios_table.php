<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('artista_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas');
            $table->boolean('discografia_artista')->default(false);
            $table->boolean('top_semanal_artista')->default(false);
            $table->boolean('grafico_artista')->default(false);
            $table->boolean('discografia_album')->default(false);
            $table->boolean('top_semanal_album')->default(false);
            $table->boolean('grafico_album')->default(false);
            $table->boolean('coluna_semanal_musica')->default(false);
            $table->boolean('coluna_semanal_artista')->default(false);
            $table->boolean('coluna_semanal_album')->default(false);
            $table->boolean('top_1_musica')->default(false);
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
        Schema::dropIfExists('relatorios');
    }
}
