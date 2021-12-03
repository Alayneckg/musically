<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopSemanalMusicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_semanal_musicas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('musica_id')->unsigned();
            $table->foreign('musica_id')->references('id')->on('musicas');
            $table->bigInteger('artista_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas');
            $table->string('data_ref')->nullable();
            $table->string('nome')->nullable();
            $table->string('posicao')->nullable();
            $table->string('views')->nullable();
            $table->string('alcance')->nullable();
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
        Schema::dropIfExists('top_semanal_musicas');
    }
}
