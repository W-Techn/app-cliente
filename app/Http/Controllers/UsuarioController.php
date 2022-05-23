<?php

namespace App\Http\Controllers;

use App\AppUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $usuario = $_SESSION; 
       return view('app.usuario.index' ,['usuario'=> $usuario]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('app.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AppUsuario::create($request->all());
        return view('app.usuario.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppUsuario  $appUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(AppUsuario $usuario)
    {
        //dd($usuario);
        return view('app.usuario.show' ,['usuario'=> $usuario]); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppUsuario  $appUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(AppUsuario $usuario)
    {
        return view('app.usuario.edit' ,['usuario'=> $usuario]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppUsuario  $appUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppUsuario $usuario)
    {
        //dd($request->all());
       $dados=$request->all();
       $dados['codigo']=null;
       $usuario->update($dados);


       session_destroy();
       return redirect()->route('app.login');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppUsuario  $appUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppUsuario $appUsuario)
    {
        //
    }
}
