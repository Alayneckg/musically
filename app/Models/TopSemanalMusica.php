<?php

namespace App\Models;

use App\Models\Musica;
use App\Models\Artista;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TopSemanalMusica extends Model
{
    use HasFactory;

    protected $fillable = [
        'musica_id', 'artista_id', 'data_ref', 'nome', 'posicao', 'views', 'alcance'
    ];

    public function musica()
    {
    	return $this->belongsTo(Musica::class);
    }

    public function artista()
    {
    	return $this->belongsTo(Artista::class);
    }
}
