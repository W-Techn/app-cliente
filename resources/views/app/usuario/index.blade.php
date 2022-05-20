@extends('app.layouts._components.cabecalho_e_rodape')

@section('titulo', 'Usuarios')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

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
                                <td>{{ $user['nome'] }}</td>
                                <td>{{ $user['username'] }}</td>
                                <td>{{ $user['email']}}</td>
                                <td><a href="">Excluir</a></td>
                                <td><a href="">Editar</a></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection