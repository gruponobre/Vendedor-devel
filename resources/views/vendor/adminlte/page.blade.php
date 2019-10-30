@extends('adminlte::master')

@section('adminlte_css')
<link rel="stylesheet"
href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
@stack('css')
@yield('css')
@stop

@section('body_class','skin-' . config('adminlte.skin', 'blue') . (config('adminlte.layout') ? [
'boxed' => 'layout-boxed',
'fixed' => 'fixed',
'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
            <!-- Header Navbar -->
            <nav role="navigation" class="topheader">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle fa5" data-toggle="push-menu" role="button"
                style="color:black">
                <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                </a>
            <!-- Navbar Right Menu -->

                <!-- Imagem do menu superior(Proporção 5x1) -->
                <p align="center"> 
                    <div style="display: flex; flex-direction: row; align-items: center; width: 55%; height: 100%; justify-content: center;">
                        <a href="{{ route('home')}}">
                            <img src="images/planosnobre.png" alt="Plano Nobre" height="65%">
                        </a>
                        <a href="{{ route('home')}}">
                            <span style=" width: 50%; display: flex; flex-direction: row;align-content: center; margin-top: 6%; margin-left: 2%">
                                <p style="font-size: 2.7vh;color:#00529c">PLANOS</p>
                                <p style="font-size: 2.7vh;color: #003366; font-weight: 900">NOBRE</p>
                            </span>
                        </a>
                    </div>
                </p>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                            <i class="fa fa-fw fa-power-off" style="color:black;"></i>
                            </a>
                        <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none">
                            {{ csrf_field() }}
                        </form>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- Box img do side bar -->
    <div class="user-panel margem">
        <div style="display: flex; justify-content: center; flex-direction: column; ">
            <div class="pull-left image" style="margin: 0 auto">
                <form runat="server" action="{{ route('postar') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <input type="file" id="imgInp" name="imgInp" accept=".jpg, .png" value="Escolher" style="display: none" onchange="form.submit()">
                </form>
                <label for="imgInp">
                    <div style="position: relative; width: 100%; height: 90%">
                        <div style="width: 100px; height: 100px">
                            <img id="img" name="img" class="profile-user-img img-circle" src="images/profile-images/{{ Session('codifunc') }}.jpg"  onerror="this.src='/images/perfil.png'" style="width: 100px; height:100px; border-radius: 60px; object-fit: cover">

                            <div style="background-color: white; width: 25px; height: 25px; border-radius: 50px; top: 60px; left: 75px; position: absolute;">
                                <span class="fas fa-camera ml-1" style="margin: 5.5 5.5"></span>
                            </div>
                        </div>
                    </div>
                </label>
            </div>

        </div>
    </div>

    <!-- Nome da pessoa -->
    <div  style="width:70%; height:100%; margin: 15 auto; text-align: center; font-size: 11
    0%; color: white; word-wrap: break-word">
        {{session('nomefunc')}}
    </div>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content_header')
        </section>

        <!-- Main content -->
        <section class="content" style="padding: 0px">

            @yield('content')

        </section>
</div>
<!-- /.content-wrapper -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-1" style="background-color: #B6E4F2">
        <a target="_blank" style="color: black" href="http://www.gruponobre.com"> Grupo Nobre </a>
        © <script>var date = new Date; document.write( date.getFullYear());</script>
    </div>
    <!-- Copyright -->

</div>
<!-- ./wrapper -->
@stop

@section('adminlte_js')
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

</script>

@stack('js')
@yield('js')

@stop
