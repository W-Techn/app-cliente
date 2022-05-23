
{{-- Permitindo que app/_componets/cabecalho_e_rodape.blade.php possa usar meu template --}}
@extends('app.layouts._components.cabecalho_e_rodape')

@section('conteudo')

<div class="container mt-5 text-center ">
    <h3>Pesquise e selecione um cliente para cadastrar a dívida</h3>
    <form action="{{ route('divida.index') }}" class="row g-4 justify-content-center mt-1" method="GET">

        <div class="col-md-5">
            <label for="pesquisa" class="visually-hidden"></label>
            <input type="search" class="form-control" name="pesquisa" id="pesquisa" placeholder="Busque por nome, CPF, CNPJ ou Razão Social" required>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Pesquisar</button>
        </div>

    </form>
</div>

@if ($consulta != "")  {{-- Se houver alguma consulta --}}
    <div class="container mt-5 mb-5">
        <div class="list-group">

            @foreach ($consulta as $cliente)
                <a href="{{ route('divida.create', ['cliente' => $cliente->id]) }}" class="list-group-item list-group-item-action border-1 mb-3">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $cliente->nome ?? $cliente->razaoSocial }}</h5>
                    </div>

                    @if ($cliente->cpf != null)
                        <p class="mb-1"><strong>CPF:</strong> {{ $cliente->cpf }}</p>
                    @else
                        <p class="mb-1"><strong>CNPJ:</strong> {{ $cliente->cnpj }}</p>
                    @endif
                </a>
            @endforeach

        </div>
    </div>
@endif

@endsection
