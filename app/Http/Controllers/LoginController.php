<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function erro(Request $request)
    {

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuario e ou senha não existe';
        };

        if ($request->get('erro') == 2) {
            $erro = 'Necessário estar autenticado para acessar esse conteudo';
        };

      

        return view('app.login', ['erro' => $erro]);
    }




    public function acesso(Request $request){

        //pegando do formulario
        $codigo = $request->get('codigo');


       // $usuario = new User;

        $usuario = User::where('codigo', $codigo)
                        ->get()->first();



        if(isset($usuario->codigo)){
            session_start();
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['username'] = $usuario->username;
            $_SESSION['type'] = $usuario->type;
            $_SESSION['codigo'] = $usuario->codigo;
            
            //dd($_SESSION);

            return redirect()->route('usuario.show', ['usuario' => $usuario->id]);
        }else{
            return view('app.primeiro-acesso');
            // return redirect()->route('app.primeiro-acesso');
        }
    }


    public function autenticar(Request $request){
        
        //regra de autenticação
        $regras = [
          'usuario' => 'required',
          'senha' => 'required'
        ];

        //mensagens de feedback de validação
        $feedback = [
            'usuario.required' => 'O campo usuario é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];


        $request->validate($regras, $feedback);

        //Recuperar os dados do formulario
        $username = $request->get('usuario');
        $password = $request->get('senha');


        //Reaproveitando o model User do laravel
        $user = new User();

        $usuario = $user->where('username', $username)
                        ->where('password', $password)
                        ->orWhere('email', $username)
                        ->where('password', $password)
                        ->get()->first();


        /*
            Se inicia a sessão para que os dados fiquem salvos, como se fossem um cookie,
            permitindo assim continuar o acesso após login válido.


            $_SESSION-> superGlobal, no qual pega o dado do db verificado com o input
        */

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['username'] = $usuario->username;
            $_SESSION['type'] = $usuario->type;

        //dd($_SESSION);

           return redirect()->route('app.paginainicial');
        }else{
            return redirect()->route('app.login');
        }
    }


    public function sair()
    {
        session_destroy();
        return redirect()->route('index');
    }

    

    
}
