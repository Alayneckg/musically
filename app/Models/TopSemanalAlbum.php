<?php

namespace App\Models;

use App\Models\Artista;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TopSemanalAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_album', 'data_ref', 'nome', 'posicao', 'views', 'alcance'
    ];

    public function album()
    {
    	return $this->belongsTo(Album::class);
    }
}
