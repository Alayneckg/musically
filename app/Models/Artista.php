<?php

namespace App\Models;

use App\Models\Album;
use App\Models\Musica;
use App\Models\TopSemanalArtista;
use App\Models\TopSemanalMusica;
use App\Models\TopSemanalAlbum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artista extends Model
{
    use HasFactory;

    protected $fillable = [
        'idV', 'nome', 'imagem', 'views', 'url'
    ];

    public function albuns()
    {
    	return $this->hasMany(Album::class);
    }

    public function musicas()
    {
    	return $this->hasMany(Musica::class);
    }

    public function top_artistas()
    {
    	return $this->hasMany(TopSemanalArtista::class);
    }

    public function top_musicas()
    {
    	return $this->hasMany(TopSemanalMusica::class);
    }

    public function top_album()
    {
    	return $this->hasMany(TopSemanalAlbum::class);
    }
}
