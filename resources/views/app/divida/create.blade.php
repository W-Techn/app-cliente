
{{-- Permitindo que app/_componets/cabecalho_e_rodape.blade.php possa usar meu template --}}
@extends('app.layouts._components.cabecalho_e_rodape')

@section('conteudo')


@component('app.layouts._components.formulario_divida', ['cliente' => $cliente])
@endcomponent

@endsection
