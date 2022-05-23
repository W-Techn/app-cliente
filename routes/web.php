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

//Route::get('/primeiro-acessso/{erro?}', 'LoginController@erro')->name('app.primeiro-acesso');
Route::get('/primeiro-acesso', 'LoginController@acesso')->name('app.primeiro-acesso');
Route::post('/primeiro-acesso', 'LoginController@acesso')->name('app.primeiro-acesso');


Route::get('/', 'PrincipalController@index')->name('index');


Route::middleware('autenticar')->prefix('/app')->group(function () {


    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::match(['get','post'], '/home', 'PaginaInicialController@home')->name('app.paginainicial');

    Route::resource('divida', 'DividaController');
    Route::resource('cliente', 'ClienteController');


    Route::middleware('admin')->group(function () {
        
        Route::resource('usuario', 'UsuarioController');
    });
});

Route::fallback('ErroController@index')->name('app.error404');
