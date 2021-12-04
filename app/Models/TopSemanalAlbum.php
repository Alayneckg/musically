<?php

namespace App\Models;

use App\Models\Album;
use App\Models\Artista;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TopSemanalAlbum extends Model
{
    use HasFactory;

    protected $table = 'top_semanal_albuns';

    protected $fillable = [
        'album_id', 'artista_id', 'data_ref', 'nome', 'posicao', 'views', 'alcance'
    ];

    public function album()
    {
    	return $this->belongsTo(Album::class);
    }

    public function artista()
    {
    	return $this->belongsTo(Artista::class);
    }
}
