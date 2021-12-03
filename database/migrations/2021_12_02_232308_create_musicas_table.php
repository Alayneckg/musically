<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->string('idV')->nullable();
            $table->bigInteger('id_artista')->unsigned();
            $table->foreign('id_artista')->references('idV')->on('artistas');
            $table->bigInteger('id_album')->unsigned()->nullable();
            $table->foreign('id_album')->references('idV')->on('albuns');
            $table->string('nome')->nullable();
            $table->string('url')->nullable();
            $table->string('lançamento')->nullable();
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
        Schema::dropIfExists('musicas');
    }
}
