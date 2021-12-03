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
    </style>
    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="section-heading" style="text-align: center;">
                        <h6>Finalizados</h6>
                        <h2>Relatórios <span style="font-style: italic">AD-Hoc</span></h2>
                    </div>
                    <div class="col-lg-12">
                    <table class="" id="table1">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Confirmados <small style="font-weight: 400">total</small></th>
                                    <th>Confirmados <small style="font-weight: 400">hoje</small></th>
                                    <th>Recuperados <small style="font-weight: 400">total</small></th>
                                    <th>Recuperados <small style="font-weight: 400">hoje</small></th>
                                    <th>Mortes <small style="font-weight: 400">total</small></th>
                                    <th>Mortes <small style="font-weight: 400">hoje</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>bla</td>
                                    <td>bla bla</td>
                                    <td>bla bla</td>
                                    <td>bla bla</td>
                                    <td>bla bla</td>
                                    <td>bla bla</td>
                                    <td>bla bla</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('footer')
@include('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#table1').DataTable();
        } );
    </script>
