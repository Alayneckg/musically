@include('header');
    <style>
        input[type="checkbox"] {
            width: 0;
            height: 0;
            visibility: hidden;
            display: inline-block;
        }
        label {
            width: 70px;
            height: 30px;
            /* display:block; */
            background-color: #a6c8cf;
            border-radius: 100px;
            position: relative;
            cursor: pointer;
            transition: 0.5s;
            box-shadow: 0 0 20px #a6c8cf99;
            float: right !important;
            /* display: inline-block; */
        }
        label::after {
            content: "";
            width: 24px;
            height: 24px;
            background-color: #e8f5f7;
            position: absolute;
            border-radius: 70px;
            top: 3px;
            left: 3px;
            transition: 0.5s;
        }

        input:checked + label:after {
            left: calc(100% - 10px);
            transform: translateX(-100%);
        }

        input:checked + label {
            background-color: #088ec3;
        }

        label:active:after {
            width: 32px;
        }

        .texto_artista{
            color: grey;
        }

        .texto_top{
            color: grey;
        }

    </style>
    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="/relatorio-post" method="POST">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="section-heading">
                                    <h6>Selecione os campos que deseje adicionar ao relatório</h6>
                                    <h2>Criar relatório <span style="font-style: italic">AD-Hoc</span></h2>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6" style="border-right: 1px dashed #c7c9c9; text-align:left;">
                                        <div class="row">
                                            <div class="col-lg-7" style=" font-weight: bold; display:table-cell; vertical-align:middle;">
                                                <span >Gerar relatório a partir de um artista</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="checkbox" name="switch_artista" id="switch_artista" onclick="checkArtista(this.checked)">
                                                <label for="switch_artista"></label>
                                            </div>
                                            <br>
                                            <fieldset style="width:85%">
                                                <span class="texto_artista">Selecione artista </span>
                                                <select name="artista" id="artista_select" placeholder="Name" disabled>
                                                    @foreach($artistas as $artista)
                                                        <option value="{{ $artista->id }}">{{ $artista->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                            <hr>
                                            <span style="color: #088ec3; font-weight:bold">Música</span>
                                            <br>
                                            <hr style="border: 1px dashed #31ffffb0;">
                                            <br>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_artista">Discografia completa</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_artista" name="discografia_artista" id="discografia_artista" disabled>
                                                        <label for="discografia_artista"></label>
                                                    </div>
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_artista">Aparições no Top semanal</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_artista" name="top_semanal_artista" id="top_semanal_artista" disabled>
                                                        <label for="top_semanal_artista"></label>
                                                    </div>
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_artista">Gráfico linha temporal (Top semanal)</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_artista" name="grafico_artista" id="grafico_artista" disabled>
                                                        <label for="grafico_artista"></label>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <span style="color: #088ec3; font-weight:bold">Álbum</span>
                                            <br>
                                            <hr style="border: 1px dashed #31ffffb0;">
                                            <br>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_artista">Discografia completa</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_artista" name="discografia_album" id="discografia_album" disabled>
                                                        <label for="discografia_album"></label>
                                                    </div>
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_artista">Aparições no Top semanal</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_artista" name="top_semanal_album" id="top_semanal_album" disabled>
                                                        <label for="top_semanal_album"></label>
                                                    </div>
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_artista">Gráfico linha temporal (Top semanal)</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_artista" name="grafico_album" id="grafico_album" disabled>
                                                        <label for="grafico_album"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="text-align:left;">
                                        <div class="row">
                                            <div class="col-lg-7" style=" font-weight: bold; display:table-cell; vertical-align:middle;">
                                                <span >Gerar relatório a partir do Top semanal</span>
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="checkbox" name="switch_top_semanal" id="switch_top_semanal" onclick="checkTop(this.checked)">
                                                <label for="switch_top_semanal"></label>
                                            </div>
                                            <hr>
                                            <span style="color: #088ec3; font-weight:bold">As que apareceram com maior frequência</span>
                                            <br>
                                            <hr style="border: 1px dashed #31ffffb0;">
                                            <br>
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_top">Música</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_top" name="coluna_semanal_musica" id="coluna_semanal_musica" disabled>
                                                        <label for="coluna_semanal_musica"></label>
                                                    </div>
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_top">Artista</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_top" name="coluna_semanal_artista" id="coluna_semanal_artista" disabled>
                                                        <label for="coluna_semanal_artista"></label>
                                                    </div>
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_top">Album</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_top" name="coluna_semanal_album" id="coluna_semanal_album" disabled>
                                                        <label for="coluna_semanal_album"></label>
                                                    </div>
                                                    <div class="col-lg-7" style="display:table-cell; vertical-align:middle;">
                                                        <span class="texto_top">Lista de todas músicas da posição 1</span>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="checkbox" class="check_top" name="top_1_musica" id="top_1_musica" disabled>
                                                        <label for="top_1_musica"></label>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button ">Criar relatório</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@include('scripts')
    <script>
        function checkArtista(click){
            if(click == true){
                document.querySelectorAll('span.texto_artista').forEach(e => e.style.color = "black");
                document.querySelectorAll('input.check_artista').forEach(e => e.disabled = false);
                document.getElementById('artista_select').disabled = false;
            }else{
                document.querySelectorAll('span.texto_artista').forEach(e => e.style.color = "grey");
                document.querySelectorAll('input.check_artista').forEach(e => e.disabled = true);
                document.querySelectorAll('input.check_artista').forEach(e => e.checked = false);
                document.getElementById('artista_select').disabled = true;
            }
        };
        function checkTop(click){
            if(click == true){
                document.querySelectorAll('span.texto_top').forEach(e => e.style.color = "black");
                document.querySelectorAll('input.check_top').forEach(e => e.disabled = false);
            }else{
                document.querySelectorAll('span.texto_top').forEach(e => e.style.color = "grey");
                document.querySelectorAll('input.check_top').forEach(e => e.disabled = true);
                document.querySelectorAll('input.check_top').forEach(e => e.checked = false);
            }
        };
    </script>
