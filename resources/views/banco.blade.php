@include('header');
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        .fadeInRight{
            position: relative;
            background-color: #c6ecff9e;
            padding: 60px 80px;
            border-radius: 50px;
        }
        table.dataTable tbody tr{
            background-color: transparent;
        }
        h4{
            text-align: center;
            color: #088ec3;
            font-weight: bold;
        }
        .container{
            padding: 0;
            margin: auto;
            max-width: 100%;
            width: 90%;
        }
        .compact{
            text-align: center;
        }
    </style>
    <div id="about" class="about-us section">
        <div class="container">
            <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row">
                    <div class="section-heading" style="text-align: center; display:inline-block">
                        <h2 style="display:inline-block;">Banco de <span>Dados</span></h2> <span class="main-blue-button" style="float:right;"><a style="background-color: #005678" href="/popular">Popular Banco</a></span>
                    </div>
                    <br>
                    <br>
                    <br>
                    <!-- Artistas -->
                    <div class="col-lg-12">
                        <h4>Artistas</h4>
                        @isset($artistas)
                            <table class="compact" style="white-space:nowrap;" id="table_artistas">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome </th>
                                        <th>Url </th>
                                        <th>Views</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($artistas as $artista)
                                        <tr>
                                            <td>{{ $artista->idV }}</td>
                                            <td>{{ $artista->nome  }}</td>
                                            <td>{{ $artista->url  }}</td>
                                            <td>{{ $artista->views  }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>Tabela vazia</span>
                        @endisset
                        <br>
                        <hr>
                        <br>
                    </div>
                    <!-- Músicas -->
                    <div class="col-lg-12">
                        <h4>Músicas</h4>

                        @isset($musicas)
                            <table class="compact" style="white-space:nowrap;" id="table_musicas">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome </th>
                                        <th>Artista </th>
                                        <th>Url </th>
                                        <!-- <th>Lançamento</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($musicas as $musica)
                                        <tr>
                                            <td>{{ $musica->idV }}</td>
                                            <td>{{ $musica->nome }}</td>
                                            <td>{{ $musica->artista->nome }}</td>
                                            <td>{{ $musica->url }}</td>
                                            <!-- <td>{{ $musica->lancamento }}</td> -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>Tabela vazia</span>
                        @endisset
                        <br>
                        <hr>
                        <br>
                    </div>
                    <!-- Álbuns -->
                    <div class="col-lg-12">
                        <h4>Álbuns</h4>
                        @isset($albuns)
                            <table class="compact" id="table_albuns">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome </th>
                                        <th>Artista </th>
                                        <th>Url </th>
                                        <th>Lançamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($albuns as $album)
                                        <tr>
                                            <td>{{ $album->idV }}</td>
                                            <td>{{ $album->nome }}</td>
                                            <td>{{ $album->artista->nome }}</td>
                                            <td>{{ $album->url }}</td>
                                            <td>{{ $album->lancamento }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>Tabela vazia</span>
                        @endisset
                        <br>
                        <hr>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <h4>Top semanal artistas</h4>
                        @isset($top_artistas)
                            <table class="compact" id="table_top_artistas">
                                <thead>
                                    <tr>
                                        <th>Artista </th>
                                        <th>Data de Referência </th>
                                        <th>Posição </th>
                                        <th>Views</th>
                                        <!-- <th>alcance</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($top_artistas as $top_artista)
                                        <tr>
                                            <td>{{ $top_artista->nome }}</td>
                                            <td>{{ $top_artista->data_ref }}</td>
                                            <td>{{ $top_artista->posicao }}</td>
                                            <td>{{ $top_artista->views }}</td>
                                            <!-- <td>{{ $top_artista->alcance }}</td> -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>Tabela vazia</span>
                        @endisset
                        <br>
                        <hr>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <h4>Top semanal musicas</h4>
                        @isset($top_musicas)
                            <table class="compact" id="table_top_musicas">
                                <thead>
                                    <tr>
                                        <th>Musica </th>
                                        <th>Artista </th>
                                        <th>Data de Referência </th>
                                        <th>Posição </th>
                                        <th>Views</th>
                                        <!-- <th>alcance</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($top_musicas as $top_musica)
                                        <tr>
                                            <td>{{ $top_musica->nome }}</td>
                                            <td>{{ $top_musica->musica->artista->nome }}</td>
                                            <td>{{ $top_musica->data_ref }}</td>
                                            <td>{{ $top_musica->posicao }}</td>
                                            <td>{{ $top_musica->views }}</td>
                                            <!-- <td>{{ $top_musica->alcance }}</td> -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>Tabela vazia</span>
                        @endisset
                        <br>
                        <hr>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <h4>Top semanal albuns</h4>
                        @isset($top_albuns)
                            <table class="compact" id="table_top_albuns">
                                <thead>
                                    <tr>
                                        <th>Musica </th>
                                        <th>Artista </th>
                                        <th>Data de Referência </th>
                                        <th>Posição </th>
                                        <th>Views</th>
                                        <!-- <th>Alcance</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($top_albuns as $top_album)
                                        <tr>
                                            <td>{{ $top_album->nome }}</td>
                                            <td>{{ $top_album->artista->nome }}</td>
                                            <td>{{ $top_album->data_ref }}</td>
                                            <td>{{ $top_album->posicao }}</td>
                                            <td>{{ $top_album->views }}</td>
                                            <!-- <td>{{ $top_album->alcance }}</td> -->
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        @else
                            <span>Tabela vazia</span>
                        @endisset
                        <br>
                        <hr>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_artistas').DataTable({
                responsive: true,
            });
            $('#table_musicas').DataTable({
                responsive: true,
            });
            $('#table_albuns').DataTable({
                responsive: true,
            });
            $('#table_top_artistas').DataTable({
                responsive: true,
            });
            $('#table_top_musicas').DataTable({
                responsive: true,
            });
            $('#table_top_albuns').DataTable({
                responsive: true,
            });
        } );
    </script>
