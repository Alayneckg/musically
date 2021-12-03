<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopSemanalArtistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_semanal_artistas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_artista')->unsigned()->nullable();
            $table->foreign('id_artista')->references('id')->on('artistas');
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
        Schema::dropIfExists('top_semanal_artistas');
    }
}
