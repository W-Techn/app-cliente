<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class PrimeiroAcessoController extends Controller
{
    public function erro(Request $request){

        $erro = '';
        
        if($request->get('erro') == 1){
            $erro = 'Código Inexistente';
        };

        return view('app.primeiro-acesso', ['erro' => $erro]);
    }

    public function autenticar(Request $request){

        $remember_token = $request->get('remember_token');


        $user = new User;

        $usuario = $user->where('remember_token', $remember_token)
                        ->get()->first();



        if(isset($usuario->remember_token)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['username'] = $usuario->username;
            $_SESSION['type'] = $usuario->type;
            $_SESSION['remember_token'] = $usuario->remember_token;
            
            dd($_SESSION);

            return view('usuario.show', ['erro' => $erro]);
        }else{
            return redirect()->route('app.primeiro-acesso', ['erro' => 1]);
        }
    }
}
