<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Index, lista o usuario cadastrado/logado.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $_SESSION;

        //dd($user);

        return view('app.usuario.index', ['user' => $user]);
    }

    /**
     * Apresenta o formulario de criação de usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        return view('app.usuario.create');
    }

    /**
     * Metodo de criar/armazenar os dados do formulario create.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return view('app.usuario.create');
    }

    /**
     * Direcionando, apresentando o usuario.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        dd($usuario);
        return view('app.usuario.show', ['usuario' => $usuario]);
    }


    /**
     * Apresentar formulario de edição de usuario, retornando seus dados..
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return view('app.usuario.edit', ['usuario' => $usuario]);
        //dd($usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        // dd($request->all());
        $dados = $request->all();
    
       $dados['remember_token'] = null;
       $usuario->update($dados);
       //dd($dados);

       session_destroy();

       return redirect()->route('app.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
