<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albuns', function (Blueprint $table) {
            $table->id();
            $table->string('idV')->nullable();
            $table->bigInteger('id_artista')->unsigned();
            $table->foreign('id_artista')->references('id')->on('artistas');
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
        Schema::dropIfExists('albuns');
    }
}
