<?php

namespace App\Models;

use App\Models\Artista;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TopSemanalArtista extends Model
{
    use HasFactory;

    protected $fillable = [
        'artista_id', 'data_ref', 'nome', 'posicao', 'views', 'alcance'
    ];

    public function artista()
    {
    	return $this->belongsTo(Artista::class);
    }

}
