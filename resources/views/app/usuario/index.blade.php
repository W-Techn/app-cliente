@extends('app.layouts._components.cabecalho_e_rodape')

@section('titulo', 'Meu Perfil')

@section('conteudo')


<div class="container">
<h1>Olá, seja bem vindo {{$usuario['nome']}}</h1>
<p>Aqui estão suas informações!</p>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Apelido</th>
      <th scope="col">E-mail</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$usuario['nome']}}</td>
      <td>{{$usuario['nome_login']}}</td>
      <td>{{$usuario['email']}}</td>
    </tr>
    </table>
</div>            




            
    {{-- </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('usuario.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                        <tr>
                            <td>{{ $usuario['nome'] }}</td>
                            <td>{{ $usuario['nome_login'] }}</td>
                            <td>{{ $usuario['email']}}</td>
                            <td><a href="">Excluir</a></td>
                            <td><a href="">Editar</a></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>

</div> --}}

@endsection