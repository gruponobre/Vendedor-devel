<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function username()
    {
        return 'username';
    }

    protected function showLoginForm(Request $request)
    {

        return view('auth.login');

    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|max:11',
            'password' => 'required|string|max:8',
        ]);
    }

    public function login(Request $request)
    {


        if ($this->attemptLogin($request)) {
            return redirect()->route('home');
        }


    }

    protected function attemptLogin(Request $request)
    {


        try {
            //Pega os dados do usuário e formata para ficar comparável com os dados do banco
            $pesquisa = $request->all();
            $cpf = preg_replace('/[^\p{N}]/', '', $pesquisa['cpffunc'] );
            $datanasc = explode('/', $pesquisa['data']);
            $datanasc = $datanasc[2].$datanasc[1].$datanasc[0];
            $datanasc = new \DateTime($datanasc);
            $request->session()->put('banco', $pesquisa['banco']);

            //Puxa os dados do funcionário de acordo com cpf e data de nascimento.
            $resultadoBD = DB::connection($request->session()->get('banco'))->table("funcionarios")
                ->where([
                ["cpffunc", "=", $cpf],
                ["datanasc", "=", $datanasc]
            ])->get();

            $dados = $resultadoBD->all();

            //Pões dados essenciais à aplicação na sessão, que serão acessados por outros controllers e manda 
            //o usuário autenticado para a home
            if ($resultadoBD->all() != null) {
                $request->session()->put('dados',$dados);
                $request->session()->put('cpffunc',$cpf);
                $request->session()->put('codifunc', $resultadoBD->last()->codifunc);
                $request->session()->put('nomefunc', $resultadoBD->last()->nomefunc);

                return redirect()->route('home');

            } else {
                return $this->sendFailedLoginResponse($request);

            }
        } catch (\Exception $e) {

            return $this->sendFailedLoginResponse($request);

        }


    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('login');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'password' => [trans('auth.failed')],
        ]);
    }

    protected function loggedOut(Request $request)
    {
        //
    }

    protected function sendLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'passsenh' => [trans('auth.failed')],
        ]);
        redirect()->route('auth.login');
    }

}
