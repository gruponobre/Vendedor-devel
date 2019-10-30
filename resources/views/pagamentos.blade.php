@extends('adminlte::page')

@section('title', 'Planos Nobre')

<head>

    <link rel="stylesheet" href="{{ asset('css/vendedorGrupoNobre.css') }}">
    <link href="{{ asset('css/bootstrap-datepicker.css')}}" rel="stylesheet"/>

</head>

@section('content')
    <!-- Caixas -->
    <div>
        <div style="width:80%; display: flex; flex-direction:column; text-align: center; margin-left: 10%">
            <!-- Caixa maior (Total a receber) -->
            <div class="caixamaior" style="width: 45%; height: 50%">
                <div style="width: 100%;">
                    <b style="font-size: 4vw; color: gray; font-weight: 400">Comissão</b><br>
                    <b style="font-size: 7vw">{{'R$ '. $comissao->comissao}}</b><br>
                </div>
            </div>

            <!-- Caixas menores -->
            <div style="display: flex; flex-direction:row; justify-content: space-between;  margin-top: 10px; width: 100%">
                <div class="caixamenor"  style="width: 40%; height: 95%">
                    <div style="margin: 0 auto">
                        <b style="font-size: 4vw;color: gray; font-weight: 400">Beneficiários</b><br>
                        <b style="font-size: 6vw">{{$comissao->clientes}}</b>
                    </div>
                </div>

                <div class="caixamenor"  style="width: 40%; height: 95%">
                    <div style="margin: 0 auto">
                        <b style="font-size: 4vw; color: gray; font-weight: 400">Pagamentos</b><br>
                        <b style="font-size: 6vw">{{$comissao->pagamentos}}</b>
                    </div>
                </div>

            </div>
        </div>
        <!--inicio calendario-->
        <div style="margin:0 auto; display: flex; flex-direction: row; justify-content: space-between; width: 90%; margin-top: 2%; text-align: center">
            <div class="form-group">
                <form class="form-horizontal" method="get" action="{{ getenv('APP_URL') }}/pagamentos" name="form" id="form" style="width: 80%">
                    <!--Primeiro Box de Data -->
                    <label style="color: gray; font-weight: 400">Data inicial</label>
                    <div class="input-group date" style="width: 120%">
                        <div class="input-group-addon">
                            <span class="far fa-calendar-alt"></span>
                        </div>
                        <input type="text" onchange="onChange()" class="form-control" id="data" name="data" style="background-color: white" readonly="">
                    </div>
            </div>
                    
            <div class="form-group">
                <!--Segundo Box de Data -->
                <label style="color: gray; font-weight: 400">Data final</label>
                <div class="input-group date" style="width: 80%; float:right">
                    <div class="input-group-addon">
                        <span class="far fa-calendar-alt"></span>
                    </div>
                    <input type="text" class="form-control" onchange="onChange()" id="data_final" name="data_final" style="background-color: white" readonly="">
                </div>
            </div>
        </div>
        </form><!--fim calendario-->

        <!-- Tabela de dados -->
        <div style="width: 100%; height: 100%">
            <div class="box">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody style="font-size: 90%">
                                <tr>
                                    <div style="width: auto; text-align: center; font-size: 110%">
                                        <strong>Período : {{$comissao->datainit}} - {{$comissao->datafim}}</strong>
                                    </div> 
                                </tr>
                                <tr>
                                    <th>Cód</th>
                                    <th>Benef.</th>
                                    <th>Mensal.</th>
                                    <th>Data Pag.</th>
                                </tr>

                            @foreach ($comissao->lista as $pessoa)
                                <tr>
                                    <td>{{$pessoa->codibene}}</td>
                                    <td>{{$pessoa->nomebene}}</td>
                                    <td>{{date('m/Y',strtotime($pessoa->menspaga))}}</td>
                                    <td>{{date('d/m/Y',strtotime($pessoa->datapaga))}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
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
