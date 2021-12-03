@include('header');
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .lista {
        list-style: circle;
    }
    .features-item{
        box-shadow: 0px 0px 15px rgb(0 0 0 / 10%);
        margin: 10px;
    }
</style>

    <div id="features" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-content" >
                        <div class="row">
                            <div class="section-heading" style="text-align: center;">
                                <br>
                                <br>
                                <h6>Finalizados</h6>
                                <h2>Relatórios <span style="font-style: italic">AD-Hoc</span></h2>
                            </div>
                            @foreach($relatorios as $relatorio)
                                <div class="col-lg-6">
                                    <a data-toggle="collapse" href="#collapseExample-{{ $relatorio['id']}}" role="button" aria-controls="collapseExample">
                                        <div class="features-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                            <h4>Relatório {{ $relatorio['id'] }} </h4>
                                            <h6>Criado em {{ (new Datetime($relatorio['created_at']))->format('d/m/Y') }}</h6>
                                            <div class="line-dec"></div>
                                            <!-- 'top_semanal_artista', 'grafico_artista',
                                            'discografia_album', 'top_semanal_album', 'grafico_album',
                                            'coluna_semanal_musica', 'coluna_semanal_artista', 'coluna_semanal_album', 'top_1_musica' -->
                                            @isset($relatorio['artista'])
                                                <span style="font-weight: bold; color: teal;">{{ $relatorio['artista'] }}</span>
                                                <small>Artista selecionado </small>
                                            @endisset
                                            <br>
                                            <small>Clique para vizualizar todo o relatório</small>
                                            <div class="collapse" id="collapseExample-{{ $relatorio['id'] }}">
                                                <br>
                                                <hr>
                                                @isset($relatorio['discografia_artista'])
                                                    <b>Discografia completa - Música</b>
                                                    <br>
                                                    <br>
                                                    <ul class="lista">
                                                        @foreach($relatorio['discografia_artista'] as $discografia_musica)
                                                            <li>{{ $discografia_musica->nome }}</li>
                                                        @endforeach
                                                    </ul>
                                                    <hr>
                                                @endisset
                                                @isset($relatorio['top_semanal_artista'])
                                                    <b>Aparições no Top semanal - Música</b>
                                                    <br>
                                                    <br>
                                                    <ul class="lista">
                                                        @foreach($relatorio['top_semanal_artista'] as $top_semanal_artista)
                                                            <li>{{ $top_semanal_artista->nome }} - Posição {{ $top_semanal_artista->posicao }} em {{ $top_semanal_artista->data_ref }}</li>
                                                        @endforeach
                                                    </ul>
                                                    <hr>
                                                    <br>
                                                @endisset

                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <!-- <div class="col-lg-6">
                                <a data-toggle="collapse" href="#collapseExample" role="button" aria-controls="collapseExample">
                                    <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                        <div class="icon"></div>
                                        <h4>Reach Out</h4>
                                        <div class="line-dec"></div>

                                        <p>This HTML5 template is based on Bootstrap 5 CSS. You are free to customize anything.</p>
                                        <div class="collapse" id="collapseExample">
                                            <br>
                                            <hr>
                                            <br>
                                            <div >
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <div class="icon"></div>
                                    <h4>Develop a Strategy</h4>
                                    <div class="line-dec"></div>
                                    <p>Lorem ipsum dolor sit ameter consectetur adipiscing li elit sed do eiusmod.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                                    <div class="icon"></div>
                                    <h4>Implementation</h4>
                                    <div class="line-dec"></div>
                                    <p>If this template is useful for your website, please consider to <a rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a little.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="features-item second-feature last-features-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                                    <div class="icon"></div>
                                    <h4>Analyze the result</h4>
                                    <div class="line-dec"></div>
                                    <p>Below circular progress bar animation supports those CSS values 10, 20, 30, till 100.</p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('footer')
@include('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
