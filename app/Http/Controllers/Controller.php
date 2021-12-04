<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use DatePeriod;
use App\Models\Album;
use App\Models\Musica;
use App\Models\Artista;
use App\Models\Relatorios;
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
        return view('popular');
    }

    public function popularBanco(Request $request)

    {
        $limite = $request['limite'];
        $inicio = (new DateTime((explode(' - ', $request['date']))[0]))->format("Y-m-d");
        $fim = (new DateTime((explode(' - ', $request['date']))[1]))->format("Y-m-d");
        $period = new DatePeriod(
            new DateTime($inicio),
            new DateInterval('P1D'),
            new DateTime($fim),
        );

        $dates = [];
        foreach ($period as $value) {
            $dates[$value->format("Y-W")] = $value->format("YW");
        }

        $aux = 0;
        if($request['tabela'] == 'top_semanal_musica'){
            foreach($dates as $period){
                $dataPeriod[$aux] = (Http::get("https://api.vagalume.com.br/rank.php?apikey=660a4395f992ff67786584e238f501aa&type=mus&period=week&periodVal=$period&scope=all,lyrics&limit$limite"))->json();
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
                                    if($music['id'] == $data['id']){
                                        Musica::create([
                                            'idV' => $music['id'],
                                            'artista_id' => $artistaCriado['id'],
                                            'nome' => $music['desc'],
                                            'url' => $music['url'],
                                        ]);
                                    }
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
                                        'artista_id' => $artistaCriado['id'],
                                        'nome' => $album['desc'],
                                        'url' => $album['url'],
                                        'lancamento' => $album['year'],
                                    ]);

                                }
                            }
                        }
                        $date = $dataPeriod[$aux]['mus']['week']['period']['year'].'-'.$dataPeriod[$aux]['mus']['week']['period']['week'];
                        if(TopSemanalMusica::where(['musica_id'=>$data['id']])->where(['data_ref'=>$date])->exists()){
                            // Top já existe
                        }else{
                            $musicaAux = (Musica::where(['idV'=>$data['id']])->first());
                            // dd($musicaAux->artista->id)
                            if(isset($musicaAux['id'])){
                                TopSemanalMusica::create([
                                    'musica_id' => $musicaAux['id'],
                                    'artista_id' => $musicaAux->artista->id,
                                    'data_ref' => $date,
                                    'nome' => $data['name'],
                                    'posicao' => $key + 1,
                                    'views' => $data['views'],
                                    'alcance' => 'nacional',
                                ]);
                            }
                        }
                    }
                }
                $aux++;
            }

        }elseif($request['tabela'] == 'top_semanal_album'){
            foreach($dates as $period){
                $dataPeriod[$aux] = (Http::get("https://api.vagalume.com.br/rank.php?apikey=660a4395f992ff67786584e238f501aa&type=alb&period=week&periodVal=$period&scope=all,lyrics&limit$limite"))->json();
                if(isset($dataPeriod[$aux]['alb']['week']['all'])){
                    foreach($dataPeriod[$aux]['alb']['week']['all'] as $key => $data){
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
                        if(isset($artista['albums']['item'])){
                            foreach($artista['albums']['item'] as $album){
                                if(Album::where(['idV'=>$album['id']])->exists()){
                                    // Album já existe
                                }else{
                                    Album::create([
                                        'idV' => $album['id'],
                                        'artista_id' => $artistaCriado['id'],
                                        'nome' => $album['desc'],
                                        'url' => $album['url'],
                                        'lancamento' => $album['year'],
                                    ]);

                                }
                            }
                        }
                        $date = $dataPeriod[$aux]['alb']['week']['period']['year'].'-'.$dataPeriod[$aux]['alb']['week']['period']['week'];
                        if(TopSemanalAlbum::where(['album_id'=>$data['id']])->where(['data_ref'=>$date])->exists()){
                            // Top já existe
                        }else{
                            $albumAux = (Album::where(['idV'=>$data['id']])->first());
                            // dd($albumAux->artista->id)
                            if(isset($albumAux['id'])){
                                TopSemanalAlbum::create([
                                    'album_id' => $albumAux['id'],
                                    'artista_id' => $albumAux->artista->id,
                                    'data_ref' => $date,
                                    'nome' => $data['name'],
                                    'posicao' => $key + 1,
                                    'views' => $data['views'],
                                    'alcance' => 'nacional',
                                ]);
                            }
                        }
                    }

                }
                $aux++;
            }

        }elseif($request['tabela'] == 'top_semanal_artista'){
            foreach($dates as $period){
                $dataPeriod[$aux] = (Http::get("https://api.vagalume.com.br/rank.php?apikey=660a4395f992ff67786584e238f501aa&type=art&period=week&periodVal=$period&scope=all,lyrics&limit$limite"))->json();
                if(isset($dataPeriod[$aux]['art']['week']['all'])){
                    foreach($dataPeriod[$aux]['art']['week']['all'] as $key => $data){
                        $artista = ((Http::get($data['url'].'index.js'))->json())['artist'];
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

                        $date = $dataPeriod[$aux]['art']['week']['period']['year'].'-'.$dataPeriod[$aux]['art']['week']['period']['week'];
                        if(TopSemanalArtista::where(['artista_id'=>$data['id']])->where(['data_ref'=>$date])->exists()){
                            // Top já existe
                        }else{
                            $artistaAux = (Artista::where(['idV'=>$data['id']])->first());
                            if(isset($artistaAux['id'])){
                                TopSemanalArtista::create([
                                    'artista_id' => $artistaAux['id'],
                                    'data_ref' => $date,
                                    'nome' => $data['name'],
                                    'posicao' => $key + 1,
                                    'views' => $data['views'],
                                    'alcance' => 'nacional',
                                ]);
                            }
                        }
                    }

                }
                $aux++;
            }
        }

        return redirect(route('banco'));

    }

    public function relatorioCriar()
    {
        $artistas = Artista::get();
        return view('relatorioCriar', ['artistas'=>$artistas]);
    }

    public function relatorioPost(Request $request)
    {
        // artista
        if(isset($request['artista'])){
            $artista = $request['artista'];
        }else{
            $artista = null;
        }
        $create = [];
        $array = [
            "discografia_artista",  "top_semanal_artista",  "grafico_artista",  "discografia_album", "top_semanal_album",
            "grafico_album", "coluna_semanal_musica",  "coluna_semanal_artista",  "coluna_semanal_album",  "top_1_musica",
        ];
        foreach($array as $data){
            if(isset($request["$data"])){
                $create[$data] = true;
            }else{
                $create[$data] = false;
            }
        }
        $create['artista_id'] = $artista;

        Relatorios::create($create);

        return redirect(route('relatorios'));

    }

    public function relatorios()
    {
        $relatorios = Relatorios::get();
        $relatorio_completo = [];
        $aux = 0;
        foreach($relatorios as $relatorio){
            $relatorio_completo[$aux]['id'] = $relatorio->id;
            $relatorio_completo[$aux]['created_at'] = $relatorio->created_at;
            if(isset($relatorio->artista_id)){
                $relatorio_completo[$aux]['artista'] = $relatorio->artista->nome;
                // Discografia_artista
                if($relatorio->discografia_artista == 1){
                    $relatorio_completo[$aux]['discografia_artista'] = Musica::where('artista_id', $relatorio->artista_id)->get();
                }
                // Top_semanal_artista
                if($relatorio->top_semanal_artista == 1){
                    $relatorio_completo[$aux]['top_semanal_artista'] = TopSemanalMusica::where('artista_id', $relatorio->artista_id)->get();
                }
                // Grafico_artista
                if($relatorio->grafico_artista == 1){
                    $frequencia = TopSemanalMusica::where('artista_id', $relatorio->artista_id)->get();
                    $hit = [];
                    if(isset($frequencia) && count($frequencia) > 1){
                        foreach($frequencia as $key2 => $paradas){
                            $hit[$key2]['pos'] = $paradas['posicao'];
                            $hit[$key2]['data_ref'] = $paradas['data_ref'];
                        }
                    }
                    $relatorio_completo[$aux]['grafico_artista'] = $hit;
                }
                // Discografia_album
                if($relatorio->discografia_album == 1){
                    $relatorio_completo[$aux]['discografia_album'] = Album::where('artista_id', $relatorio->artista_id)->get();
                }
                // Top_semanal_album
                if($relatorio->top_semanal_album == 1){
                    $relatorio_completo[$aux]['top_semanal_album'] = TopSemanalAlbum::where('artista_id', $relatorio->artista_id)->get();
                }
                // Grafico_album
                if($relatorio->grafico_album == 1){
                    $frequencia = TopSemanalAlbum::where('artista_id', $relatorio->artista_id)->get();
                    $hit = [];
                    if(isset($frequencia) && count($frequencia) > 1){
                        foreach($frequencia as $key2 => $paradas){
                            $hit[$key2]['pos'] = $paradas['posicao'];
                            $hit[$key2]['data_ref'] = $paradas['data_ref'];
                        }
                    }
                    $relatorio_completo[$aux]['grafico_album'] = $hit;
                }
            }
            // Coluna_semanal_musica
            if($relatorio->coluna_semanal_musica == 1){
                $relatorio_completo[$aux]['coluna_semanal_musica'] = TopSemanalMusica::select('musica_id', TopSemanalMusica::raw('COUNT(musica_id) AS occurrences'))->groupBy('musica_id')
                ->orderBy('occurrences', 'DESC')->limit(5)->get();;
            }
            // Coluna_semanal_artista
            if($relatorio->coluna_semanal_artista == 1){
                $relatorio_completo[$aux]['coluna_semanal_artista'] = TopSemanalArtista::select('artista_id', TopSemanalArtista::raw('COUNT(artista_id) AS occurrences'))->groupBy('artista_id')
                ->orderBy('occurrences', 'DESC')->limit(5)->get();;
            }
            // Coluna_semanal_album
            if($relatorio->coluna_semanal_album == 1){
                $relatorio_completo[$aux]['coluna_semanal_album'] = TopSemanalAlbum::select('album_id', TopSemanalAlbum::raw('COUNT(album_id) AS occurrences'))->groupBy('album_id')
                ->orderBy('occurrences', 'DESC')->limit(5)->get();;
            }

            // Top_1_musica
            if($relatorio->top_1_musica == 1){
                $relatorio_completo[$aux]['top_1_musica'] = TopSemanalMusica::where('posicao', 1)->get();
            }
            $aux++;
        }
        // dd($relatorio_completo);
        return view('relatorios', ['relatorios'=>$relatorio_completo]);
    }

    public function banco()
    {
        $artistas = Artista::get();
        $musicas = Musica::get();
        $albuns = Album::get();
        $top_artistas = TopSemanalArtista::get();
        $top_musicas = TopSemanalMusica::get();
        $top_albuns = TopSemanalAlbum::get();
        return view('banco', ['artistas' => $artistas, 'musicas' => $musicas, 'albuns' => $albuns, 'top_artistas' => $top_artistas, 'top_musicas' => $top_musicas, 'top_albuns' => $top_albuns]);
    }

    public function sobre()
    {

        return view('sobre');
    }

}

