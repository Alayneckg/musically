<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artista;


class Relatorios extends Model
{
    use HasFactory;

    protected $fillable = [
        'artista_id',
        'discografia_artista', 'top_semanal_artista', 'grafico_artista',
        'discografia_album', 'top_semanal_album', 'grafico_album',
        'coluna_semanal_musica', 'coluna_semanal_artista', 'coluna_semanal_album', 'top_1_musica'
    ];

    public function artista()
    {
    	return $this->belongsTo(Artista::class);
    }
}
