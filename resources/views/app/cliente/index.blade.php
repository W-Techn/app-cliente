
{{-- Permitindo que app/_componets/cabecalho_e_rodape.blade.php possa usar meu template --}}
@extends('app.layouts._components.cabecalho_e_rodape')

@section('titulo', 'Pesquisar cliente')
@section('conteudo')

<div class="container mt-5 text-center ">
    <h2>Pesquisa de clientes devedores</h2>
    <form action="{{ route('cliente.index') }}" class="row g-4 justify-content-center mt-1" method="GET">

        <div class="col-md-5">
            <label for="pesquisa" class="visually-hidden"></label>
            <input type="search" class="form-control" name="pesquisa" id="pesquisa" placeholder="Busque por nome, CPF, CNPJ ou contrato" required>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
        </div>

        <div class="col-auto">
            {{-- Cria uma parametro na URL via GET informando para o Controller saber que ele quer todos os clientes --}}
            <a type="button" href="{{ route('cliente.index', 'todos=true') }}" class="btn btn-secondary mb-3">Listar todos</a>
        </div>


    </form>
</div>

@if ($consulta != "")  {{-- Se houver alguma consulta, ele entra no if --}}
    <div class="container">
        @if (count($consulta) > 0)  {{-- Se existe algum cliente devedor  --}}
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF/CNPJ</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consulta as $cliente)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>  {{-- Número da iteração do loop --}}

                        {{-- Se ele for PF, mostra o nome; se for PJ, mostra a Razão Social --}}
                        <td>{{ $cliente['cpf'] != null ? $cliente['nome'] : $cliente['razaoSocial'] }}</td>

                        {{-- Se ele for PF, mostra o CPF; se for PJ, mostra o CNPJ --}}
                        <td>{{ $cliente['cpf'] != null ? $cliente['cpf'] : $cliente['cnpj'] }}</td>

                        {{-- Verifica se ele tem dívida. Se o atributo 'nome_divida' não for nulo ele tem. --}}
                        <td>{{ count($cliente['dividas']) > 0 ? 'Com dívida' : 'Sem dívida' }}</td>

                        <td>
                            <!-- Botão que ativa o modal de cada registro -->
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal_{{ $loop->iteration }}">
                                Mais detalhes
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach ($consulta as $cliente)
                <!--
                Modal:

                Precisei colocar o modal dentro do loop do foreach e fora da tabela para fazer a ligação entre
                o registro mostrado e botão de visualizar mais detalhes. Ou seja, cada botão vai ter uma ligação
                com o registro da sua linha, logo, há um modal para cada registro mostrado.
                -->

                <div class="modal fade" id="modal_{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    <p class="d-inline"><strong>Nome:</strong> {{ $cliente['nome'] != null ? $cliente['nome'] : $cliente['razaoSocial'] }}</p>

                                    @if ($cliente['cpf'] != null)
                                        <p class="d-inline ms-5"><strong>CPF:</strong> {{ $cliente['cpf'] }}</p>
                                    @else
                                        <p class="d-inline ms-5"><strong>CNPJ:</strong> {{ $cliente['cnpj'] }}</p>
                                    @endif

                                    <p class="d-inline ms-5"><strong>Cadastrado no sistema por:</strong> ABCDE</p>
                                </div>

                                {{-- Listando as dívidas do cliente: --}}
                                <p class="fw-bold">Dívidas:</p>

                                @if (count($cliente['dividas']) > 0)
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Nome</th>
                                                <th scope="col" class="text-center">Valor</th>
                                                <th scope="col" class="text-center">Dias em atraso</th>
                                                <th scope="col" class="text-center">Data</th>
                                                <th scope="col" class="text-center">Credor</th>
                                                <th scope="col" class="text-center">Contrato</th>
                                                <th scope="col" class="text-center">Descrição</th>
                                                <th scope="col" class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cliente['dividas'] as $divida)
                                                <tr>
                                                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                                    <td class="text-center">{{ $divida['nome_divida'] }}</td>
                                                    <td class="text-center">R$ {{ $divida['valor_divida'] }}</td>
                                                    <td class="text-center">{{ new DateTime() > new DateTime($divida['data_divida']) ? (new DateTime())->diff(new DateTime($divida['data_divida']))->days : 0  }}</td>
                                                    <td class="text-center">{{ date_format(new DateTime($divida['data_divida']), 'Y/m/d') }}</td>
                                                    <td class="text-center">{{ $divida['credor_divida'] }}</td>
                                                    <td class="text-center">{{ $divida['contrato_divida'] }}</td>
                                                    <td class="text-center">{{ $divida['descricao_divida'] }}</td>

                                                    @if ($divida['pagamento_efetuado'] == 'pendente')  {{-- Se a dívida ainda não foi paga --}}
                                                        <td class="text-center">

                                                            {{--
                                                                Redireciono para o método 'update' de ClienteController passando o id do cliente.
                                                                Para faciliar a busca da dívida que deseja ser finalizada, crio um input invisível
                                                                com o id da dívida a ser finalizada.
                                                            --}}

                                                            <form action="{{ route('cliente.update', $divida['cliente_id']) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')  {{-- O método update faz parte da rota que utiliza o método HTTP PATCH --}}

                                                                <input type="hidden" name="id_divida" value="{{ $divida['id_divida'] }}">

                                                                <button type="submit" class="btn btn-primary btn-sm">Finalizar dívida</button>
                                                            </form>
                                                        </td>
                                                    @else  {{-- Se a dívida já foi paga --}}
                                                        <td class="text-center">
                                                            <p class="text-muted h5">Dívida finalizada</p>
                                                        </td>
                                                    @endif

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <h3 class="text-muted text-center">Este cliente não possui dívida</h3>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        @else  {{-- Se não existe --}}
            <h3 class="text-muted text-center">Cliente não encontrado. Tente novamente</h3>
        @endif
    </div>
@endif

@endsection
