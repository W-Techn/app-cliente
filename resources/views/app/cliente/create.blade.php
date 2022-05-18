
{{-- Permitindo que app/_componets/cabecalho_e_rodape.blade.php possa usar meu template --}}
@extends('app.layouts._components.cabecalho_e_rodape')

{{-- Passando um valor ('titulo' = 'Cadastrar cliente') para a mesma view --}}
@section('titulo', 'Cadastrar cliente')
@section('conteudo')


{{-- Botões (Início) --}}
<ul class="nav nav-pills mb-3 col-3 mx-auto" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active btn-lg" id="pills-home-tab" data-bs-toggle="pill"
            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
            aria-selected="true">Pessoa física</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link btn-lg" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Pessoa jurídica</button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        @include('app.layouts._components.formulario_pessoa_fisica')
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        @include('app.layouts._components.formulario_pessoa_juridica')
    </div>
</div>
{{-- Botões (Fim) --}}


@endsection
