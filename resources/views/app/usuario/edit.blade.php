@extends('app.layouts._components.cabecalho_e_rodape')

@section('titulo', 'Primeiro Acesso')

@section('conteudo')
 


 <div class="container mt-5 text-center">
    <h2>Criando senha de acesso</h2>
    <div class="alert alert-warning" role="alert">
    Caso alguma informação esteja incorreta, por gentileza entrar em contato com a equipe de suporte.
    </div>
    <form action="{{ route('usuario.update', ['usuario' => $usuario->id]) }}" class="row g-1 justify-content-center" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="text" name="nome" value="{{ $usuario->nome ?? old('name')}}" class="form-control" id="disabledTextInput" placeholder="Nome" disabled>
            <label for="floatingInput">Nome</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="email" name="email" value="{{ $usuario->email ?? old('email') }}" class="form-control" id="disabledTextInput" placeholder="Email"  disabled>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3 col-md-4 ms-1">
            <input type="text" name="nome_login" value="{{ $usuario->nome_login ?? old('username') }}" class="form-control" id="disabledTextInput" placeholder="Apelido"  disabled>
            <label for="floatingInput">Apelido</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="password" name="senha" value="{{ old('senha') }}" class="form-control" id="floatingInput" placeholder="Senha"  required>
            <label for="floatingInput">Senha</label>
        </div>
        <div d-flex justify-content-center id="div-botao-cliente-PF">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
   
   
@endsection
    