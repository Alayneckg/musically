@include('header');
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>
        input {
            width: 100%;
            height: 46px;
            border-radius: 5px;
            background-color: transparent;
            border: 2px solid #efefef;
            outline: none;
            font-size: 15px;
            font-weight: 300;
            color: #2a2a2a;
            padding: 0px 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="number"]{
            width: 100%;
            height: 46px;
            border-radius: 5px;
            background-color: transparent;
            border: 2px solid #efefef;
            outline: none;
            font-size: 15px;
            font-weight: 300;
            color: #2a2a2a;
            padding: 0px 20px;
            margin-bottom: 20px;
            text-align: center;
        }

    </style>
    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="/popular-banco" method="POST">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="section-heading">
                                    <h6>Selecione os campos que deseje popular o banco</h6>
                                    <h2>Popular <span >banco</span></h2>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4" >
                                            <fieldset style="width:80%; text-align:center; margin:auto">
                                                    <p style=" font-weight: bold;">Escolha uma tabela para preencher</p>
                                                <br>
                                                <select name="tabela" id="tabela" required>
                                                    <option value="top_semanal_musica">Top Semanal - Música</option>
                                                    <option value="top_semanal_artista">Top Semanal - Artista</option>
                                                    <option value="top_semanal_album">Top Semanal - Álbum</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-5" >
                                            <fieldset style="width:80%; text-align:center; margin:auto">
                                                <p style="font-weight: bold;">Escolha um período para inserir dados</p>
                                                <br>
                                                <input name="date" id="date" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-3" >
                                            <fieldset style="width:80%; text-align:center; margin:auto">
                                                <p style="font-weight: bold;">Limite por semana</p>
                                                <br>
                                                <input type="number" name="limite" id="limite" required>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button ">Popular Banco</button>
                                        </fieldset>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@include('scripts')


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(function() {
        $('input[name="date"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
});
</script>
