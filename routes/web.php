<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login/{erro?}', 'LoginController@erro')->name('app.login');
Route::post('/login', 'LoginController@autenticar')->name('app.login');

Route::get('/', 'PrincipalController@index')->name('index');


Route::middleware('autenticar.acesso')->prefix('/app')->group(function () {

    Route::patch('/login/primeiro-acesso', 'LoginController@primeiroacesso')->name('app.primeiroacesso');

    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::match(['get','post'], '/alterar-senha', 'AlterarSenhaController@alterarsenha')->name('app.alterarsenha');

    Route::match(['get','post'], '/home', 'PaginaInicialController@home')->name('app.paginainicial');

    Route::match(['get','post'], '/cadastrar-divida', 'CadastrarDividaController@cadastrardivida')->name('app.cadastro.divida');

    Route::match(['get','post'], '/listar-divida', 'ListarDividaController@listardivida')->name('app.listar.divida');

    Route::match(['get','post'], '/listar-cliente', 'ListarClienteController@listarcliente')->name('app.listar.cliente');

    Route::resource('cliente', 'ClienteController');

    Route::middleware('acesso.admin')->group(function () {
        Route::get('/cadastrar-usuario', 'CadastrarUsuarioController@cadastrarusuario')->name('app.cadastro-usuario');
        Route::post('/cadastrar-usuario', 'CadastrarUsuarioController@cadastrarusuario')->name('app.cadastro-usuario');
    });
});

Route::fallback('ErroController@index')->name('app.error404');
