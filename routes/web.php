<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'guest'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/vendas', 'VendasController@consultaVendas')->name('vendas');

    Route::get('/estatisticas', 'EstatisticasController@index')->name('estatisticas');

    Route::get('/pagamentos', 'PagamentosController@consultaPagamentos')->name('pagamentos');

    Route::get('/planos', 'PlanosController@index')->name('planos');

    Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');

	Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('postar');
});

Route::get('/rotadeteste', function () {
    phpinfo();
});

Route::get('/install', function(){  
    return view('install');
 });
