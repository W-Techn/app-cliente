
{{-- Permitindo que app/_componets/cabecalho_e_rodape.blade.php possa usar meu template --}}
@extends('app.layouts._components.cabecalho_e_rodape')

@section('conteudo')

{{-- Incluindo o formulário de cadastro de dívida --}}
@include('app.layouts._components.formulario_divida')

@endsection
