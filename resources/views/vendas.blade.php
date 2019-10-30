@extends('adminlte::page')

@section('title', 'Planos Nobre')

<head>

    <link rel="stylesheet" href="{{ asset('css/vendedorGrupoNobre.css') }}">
    <link href="{{ asset('css/bootstrap-datepicker.css')}}" rel="stylesheet"/>

</head>

@section('content')

    <div class="container">
        <div class="contentvendas">
            <!-- Input data -->
            <div style="display: flex; flex-direction: column">
                <div
                    style="display: flex; flex-direction: row; justify-content: space-between; width: 100%; height: 50%">
                    <div class="form-group">
                        <form class="form-horizontal" method="get" action="{{ route('vendas') }}" name="form" id="form">
                            <!--Primeiro Box de Data -->
                            <label style="color: gray; font-weight: 400">Data inicial</label>
                            <div class="input-group date" style="width: 95%">
                                <div class="input-group-addon">
                                    <span class="far fa-calendar-alt"></span>
                                </div>
                                <input type="text" onchange="onChange()" class="form-control" id="data" name="data"
                                       style="background-color: white" readonly>
                            </div>
                    </div>

                    <div class="form-group">
                        <!--Segundo Box de Data -->
                        <label style="color: gray; font-weight: 400">Data final</label>
                        <div class="input-group date" style="width: 95%">
                            <div class="input-group-addon">
                                <span class="far fa-calendar-alt"></span>
                            </div>
                            <input type="text" class="form-control" onchange="onChange()" id="data_final"
                                   name="data_final" style="background-color: white" readonly>
                        </div>
                    </div>
                </div>
                <!-- Botão consulta -->
                </form>
            </div>

            <!-- Box da direita QTD Clientes-->
            <div class="boxcount" style="width: 28%; height:50%; text-align: center;">
                <span style="font-size: 60%; color: gray">Beneficiários</span> <br>
                <b style="font-size: 2.5em">{{$estatisticas->quantidade}}</b>
            </div>
        </div>
    </div>

    <div>     <!-- Tabela com dados -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <nput type="hidden" id="cpffunc" value="{{session('cpffunc')}}" ></nput>
                    <thead>
                        <tr>
                            <div style="width: auto; text-align: center; font-size: 110%">
                                <strong>Período : {{$estatisticas->datainit}} - {{$estatisticas->datafim}}</strong>
                            </div>
                        </tr>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Beneficiário</th>
                        <th scope="col">Admissão</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($estatisticas->clientes as $pessoa)
                        <tr>
                            <td>{{$pessoa->codibene}}</td>
                            <td>{{$pessoa->nomebene}}</td>
                            <td>{{date('d/m/Y',strtotime($pessoa->dataadmi))}}</td>
                        </tr>
                    @endforeach
                    <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.pt-BR.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js')}}" charset="UTF-8"></script>
    <script src="moment.js"></script>
    <script type="text/javascript">
        $('#data').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            endDate: new Date()
        });

        $('#data_final').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            endDate: new Date()
        });

        $("#data_final").datepicker({defaultDate: "getDate()",
                      changeMonth: false,
                      numberOfMonths: 1,
                      minDate: 0}).datepicker("setDate", new Date());


        function onChange() {
            var data = document.getElementById('data').value;
            var data_final = document.getElementById('data_final').value;
            if (data != "" && data_final != "") {
                document.getElementById('form').submit();
            }
        }


    </script>

@stop
