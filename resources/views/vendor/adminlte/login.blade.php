@extends('adminlte::master')

@section('adminlte_css')

<head>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendedorGrupoNobre.css') }}">
</head>

@yield('css')

@stop

@section('title', 'Planos Nobre')

@section('body_class', 'login-page')

@section('body')

<div>
    <!-- Logo -->
    <div align="center" style="margin-top:90px; flex-direction:row; align-items: center">
        <img src="{{asset ('images/planosnobre.png')}}" alt="Plano Nobre" height="18%" width="28%"><br>
        <span style="font-size: 240%;color:#00529c">PLANOS</span>
        <span style="font-size: 240%; color: #003366; font-weight: 900">NOBRE</span>
    </div>

    <!-- Select de empresa/banco de dados-->
    <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
        {!! csrf_field() !!}
    <div style="margin-bottom:20px; display: flex; flex-direction: row;
        justify-content: center; align-items: center">
        <select name='banco' class="form-control" style="width: 27%; margin-top: 10%; background-color: #dddddd">
            <option value="DATASCF">Plasa</option>
            <option value="DATA1ETH">Ethernus</option>
            <option value="DATA1MNB">Mis Nobre</option>
        </select>
    </div>

    
    <div style="width: 50%; margin: 0 auto">
        <!-- CPF Input -->
        <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
            <div>
                <input type="text" name="cpffunc" id="cpf" class="form-control" value="{{ old('username') }}"
                placeholder="Digite o seu CPF">
            </div>

            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>

         <!-- Data de nascimento Input -->
        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
            <div class="form-group">
                <div class="input-group date" style="width: 100%">
                    <input type="text" class="form-control" id="data"
                    name="data" placeholder="Data de nascimento" style="background-color: white" >
                                <!--<div class="input-group-addon">
                                    <span class="far fa-calendar-alt"></span>
                                </div>-->
                </div>
            </div>

            @if ($errors->has('password'))
                <span align="center" class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>  
    </div>
    
    <!-- Botão submit -->            
    <div style="width: 25%; margin: 0 auto;">
        <button type="submit"
        class="btn btn-secondary btn-block btn-flat">Entrar
        </button>
    </div>
    </form>
</div>

@stop

@section('adminlte_js')

<script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script type="text/javascript">

    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
    });

    $("#data").mask("99/99/9999");

</script>

@yield('js')

@stop
