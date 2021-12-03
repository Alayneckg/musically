<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Album;
use App\Models\Musica;
use App\Models\Artista;
use Illuminate\Http\Request;
use App\Models\TopSemanalAlbum;
use App\Models\TopSemanalMusica;
use App\Models\TopSemanalArtista;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard()
    {
        return view('welcome');

    }

    public function popularPagina()
    {

    }

    public function popularBanco($dados)
    {
        // Dados precisa ter: Qual top Semanal quer popular, limit, range do periodo e se quer adicionar a musica do top ou todas musicas do cantor
        $periods = ['202101', '202102', '202103', '202104'];
        $dataPeriod = [];
        $aux = 0;
        // Buscando por ranking de música (TopSemanalMusica)
        foreach($periods as $period){
            $dataPeriod[$aux] = (Http::get("https://api.vagalume.com.br/rank.php?apikey=660a4395f992ff67786584e238f501aa&type=mus&period=week&periodVal=$period&scope=all,lyrics&limit3"))->json();
            // dd($dataPeriod[$aux]);
            if(isset($dataPeriod[$aux]['mus']['week']['all'])){
                foreach($dataPeriod[$aux]['mus']['week']['all'] as $key => $data){
                    $artista = ((Http::get($data['art']['url'].'index.js'))->json())['artist'];
                    if(Artista::where(['idV'=>$artista['id']])->exists()){
                        // Artista já existe
                        $artista = Artista::where(['idV'=>$artista['id']])->get();
                    }else{
                        $artistaCriado = Artista::create([
                            'idV' => $artista['id'],
                            'nome' => $artista['desc'],
                            'imagem' => 'https://www.vagalume.com.br'.$artista['pic_small'],
                            'url' => $artista['url'],
                            'views' => $artista['rank']['views'],
                        ]);
                    };
                    if(isset($artista['lyrics']['item'])){
                        foreach($artista['lyrics']['item'] as $music){
                            if(Musica::where(['idV'=>$music['id']])->exists()){
                                // Música já existe
                            }else{
                                Musica::create([
                                    'idV' => $music['id'],
                                    'id_artista' => $artistaCriado['id'],
                                    'nome' => $music['desc'],
                                    'url' => $music['url'],
                                ]);
                            }
                        }
                    }
                    if(isset($artista['albums']['item'])){
                        foreach($artista['albums']['item'] as $album){
                            if(Album::where(['idV'=>$album['id']])->exists()){
                                // Album já existe
                            }else{
                                Album::create([
                                    'idV' => $album['id'],
                                    'id_artista' => $artistaCriado['id'],
                                    'nome' => $album['desc'],
                                    'url' => $album['url'],
                                    'lancamento' => $album['year'],
                                ]);

                            }
                        }
                    }
                    $date = $dataPeriod[$aux]['mus']['week']['period']['year'].'-'.$dataPeriod[$aux]['mus']['week']['period']['week'];
                    if(TopSemanalMusica::where(['id_musica'=>$data['id']])->where(['data_ref'=>$date])->exists()){
                        // Top já existe
                    }else{
                        $musicaAux = (Musica::where(['idV'=>$data['id']])->first());
                        TopSemanalMusica::create([
                            'id_musica' => $musicaAux['id'],
                            'data_ref' => $date,
                            'nome' => $data['name'],
                            'posicao' => "$key",
                            'views' => $data['views'],
                            'alcance' => 'nacional',
                        ]);
                    }
                }
            }
            $aux++;
        }
    }

    public function relatorioCriar()
    {

        return view('relatorioCriar');
    }

    public function relatorioPost(Request $request)
    {
        dd($request);
        return view('relatorioPost');
    }

    public function relatorios()
    {

        return view('relatorios');
    }

    public function banco()
    {

        return view('banco');
    }

    public function sobre()
    {

        return view('sobre');
    }

}

