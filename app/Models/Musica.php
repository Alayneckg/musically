<?php

namespace App\Models;

use App\Models\Album;
use App\Models\Artista;
use App\Models\TopSemanalMusica;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Musica extends Model
{
    use HasFactory;

    protected $fillable = [
        'idV', 'artista_id', 'album_id', 'nome', 'url', 'lancamento'
    ];

    public function artista()
    {
    	return $this->belongsTo(Artista::class);
    }

    public function album()
    {
    	return $this->belongsTo(Album::class);
    }

    public function top_musicas()
    {
    	return $this->hasMany(TopSemanalMusica::class);
    }
}
