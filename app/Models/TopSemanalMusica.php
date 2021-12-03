<?php

namespace App\Models;

use App\Models\Musica;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TopSemanalMusica extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_musica', 'data_ref', 'nome', 'posicao', 'views', 'alcance'
    ];

    public function musica()
    {
    	return $this->belongsTo(Musica::class);
    }
}
