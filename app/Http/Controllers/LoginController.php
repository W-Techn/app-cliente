<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppUsuario;

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

        $usuario = AppUsuario::where('codigo', $codigo)
                        ->get()->first();



        if(isset($usuario->codigo)){
            session_start();
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['nome_login'] = $usuario->nome_login;
            $_SESSION['tipo_acesso'] = $usuario->tipo_acesso;
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
        $nome_login = $request->get('usuario');
        $senha = $request->get('senha');


        //Reaproveitando o model User do laravel
        $user = new AppUsuario();

        $usuario = $user->where('nome_login', $nome_login)
                        ->where('senha', $senha)
                        ->orWhere('email', $nome_login)
                        ->where('senha', $senha)
                        ->get()->first();


        /*
            Se inicia a sessão para que os dados fiquem salvos, como se fossem um cookie,
            permitindo assim continuar o acesso após login válido.


            $_SESSION-> superGlobal, no qual pega o dado do db verificado com o input
        */

        if (isset($usuario->nome)) {
            session_start();
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['nome_login'] = $usuario->nome_login;
            $_SESSION['tipo_acesso'] = $usuario->tipo_acesso;

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
