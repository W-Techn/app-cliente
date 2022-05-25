 @extends('app.layouts._components.cabecalho_e_rodape')

@section('titulo', 'Primeiro Acesso')

@section('conteudo')
 
 
 
 
    <div class="container">
        <h1>Seja bem vindo! {{ $usuario->nome }}.</h1>
            <div class="alert alert-warning" role="alert">
                Para continuar, é necessário que edite sua Nova Senha!
            </div>
        
        <a class="btn btn-primary" href="{{ route('usuario.edit', ['usuario' => $usuario]) }}">Editar</a>
    </div>




@endsection