<?php

namespace App\Models;

use App\Models\Album;
use App\Models\Musica;
use App\Models\TopSemanalArtista;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artista extends Model
{
    use HasFactory;

    protected $fillable = [
        'idV', 'nome', 'imagem', 'views', 'url'
    ];

    public function album()
    {
    	return $this->hasMany(Album::class);
    }

    public function musica()
    {
    	return $this->hasMany(Musica::class);
    }

    public function top_artista()
    {
    	return $this->hasMany(TopSemanalArtista::class);
    }
}
