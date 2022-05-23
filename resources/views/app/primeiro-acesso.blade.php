@extends('app.layouts._components.head_login')

@section('titulo', 'Primeiro acesso')

@section('login')
<div class="container mt-3">
<div class="login bg-light">
    <h2>PRIMEIRO ACESSO: </h2>
<form action={{ route('app.primeiro-acesso') }} method="post">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Código de acesso:</label>
    <input type="text" name="codigo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">Insira o código enviado via email para acesso</div>
    <br>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Acessar</button>
</form>
</div>
</div>
@endsection
