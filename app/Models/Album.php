<?php

namespace App\Models;

use App\Models\Artista;
use App\Models\TopSemanalAlbum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albuns';

    protected $fillable = [
        'idV', 'id_artista', 'nome', 'url', 'lancamento'
    ];

    public function artista()
    {
    	return $this->belongsTo(Artista::class);
    }

    public function musica()
    {
    	return $this->hasMany(Musica::class);
    }

    public function top_album()
    {
    	return $this->hasMany(TopSemanalAlbum::class);
    }
}
