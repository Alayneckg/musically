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
            $table->bigInteger('artista_id')->unsigned();
            $table->foreign('artista_id')->references('id')->on('artistas');
            $table->bigInteger('album_id')->unsigned()->nullable();
            $table->foreign('album_id')->references('id')->on('albuns');
            $table->string('nome')->nullable();
            $table->string('url')->nullable();
            $table->string('lancamento')->nullable();
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
