<?php
// @Author @GrupoNobre
// Codigo Revisado Por @EduardoLima
// @Version: 0.1 dev
// email: eduardolima@gruponobre.com
// Alterações feitas:
// Mudança nos codigos de datetime e de verificação de pesquisa, formação de tempo atual

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\API\EstatisticasServiceAPI;

class VendasController extends Controller
{

    public function consultaVendas(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        if($request->input('data') != null){
            $datainit = str_replace('/', '-', $request->input('data'));
            $datafim = str_replace('/', '-', $request->input('data_final'));
        }else{
            $datainit = '01-'.date('m-Y');
            $datafim = date('d-m-Y');
        }

        return view('vendas', ['estatisticas' => EstatisticasServiceAPI::get($request->session()->get('cpffunc'), $request->session()->get('banco'), $datainit, $datafim)]);
    }
}
