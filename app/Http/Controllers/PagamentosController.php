<?php
// @Author @GrupoNobre
// Codigo Revisado Por @EduardoLima
// @Version: 0.1 dev
// email: eduardolima@gruponobre.com
// Alterações feitas:
// Mudança na Formatação e Exibição da data, alteração nos codigos enviados a view via return

namespace App\Http\Controllers;

use App\Services\API\ComissaoServiceAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PagamentosController extends Controller
{
    public function consultaPagamentos(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        if($request->input('data') != null){
            $datainit = str_replace('/', '-', $request->input('data'));
            $datafim = str_replace('/', '-', $request->input('data_final'));
        }else{
            $datainit = '01-'.date('m-Y');
            $datafim = date('d-m-Y');
        }

        return view('pagamentos', ['comissao' => ComissaoServiceAPI::get($request->session()->get('cpffunc'), $request->session()->get('banco'), $datainit, $datafim)]);
    }
}
