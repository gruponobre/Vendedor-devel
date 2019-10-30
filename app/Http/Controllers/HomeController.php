<?php

namespace App\Http\Controllers;

use DateInterval;
use DateTime;
use App\Services\API\ComissaoServiceAPI;
use App\Services\API\EstatisticasServiceAPI;
use Illuminate\Http\Request;

class HomeController extends Controller

{
    public function index(Request $request)
    {
        $iniciomesatual = date('Ym').'01';
        $hoje = date('d-m-Y');
        
        return view('home', ['comissao' => ComissaoServiceAPI::get($request->session()->get('cpffunc'), $request->session()->get('banco'), $iniciomesatual, $hoje),
                             'estatisticas' => EstatisticasServiceAPI::getHome($request->session()->get('codifunc'), $request->session()->get('banco'))
                            ]);

    }
}
