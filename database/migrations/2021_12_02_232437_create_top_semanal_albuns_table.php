<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopSemanalAlbunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_semanal_albuns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_album')->unsigned();
            $table->foreign('id_album')->references('id')->on('albuns');
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
        Schema::dropIfExists('top_semanal_albuns');
    }
}
