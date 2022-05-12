
{{-- Permitindo que app/_componets/cabecalho_e_rodape.blade.php possa usar meu template --}}
@extends('app.layouts._components.cabecalho_e_rodape')

@section('titulo', 'Pesquisar cliente')
@section('counteudo')

@include('app.layouts._partials.barra_de_navegacao')  {{-- Inlcuindo barra de navegação --}}

<div class="container mt-5 text-center">
    <h2>Pesquisa de clientes devedores</h2>
    <form action="{{ route('app.pesquisa.cliente') }}" class="row g-3 justify-content-center mt-1" method="GET">

        <div class="col-md-5">
            <label for="pesquisaClienteDevedor" class="visually-hidden"></label>
            <input type="search" class="form-control" name="pesquisaClienteDevedor" id="pesquisaClienteDevedor" placeholder="Busque por nome, CPF, CNPJ ou contrato" required>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
        </div>
    </form>
</div>

@if ($consulta != "")  {{-- Se houver alguma consulta, ele entra no if --}}
    <div class="container">
        @if ($consulta->count() > 0)  {{-- Se existe algum cliente devedor  --}}
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF/CNPJ</th>
                        <th scope="col">Status</th>
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

                        <td>Com dívida/Sem dívida</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else  {{-- Se não existe --}}
            <h3 class="text-muted text-center">Cliente não encontrado. Tente novamente</h3>
        @endif
    </div>
@endif

@include('app.layouts._partials.rodape')  {{-- Inlcuindo rodapé --}}

@endsection
