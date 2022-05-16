@extends('app.layouts._components.head_login')

@section('titulo', 'Login')

@section('login')
<div class="container mt-3">
<div class="login bg-light">
    <h2>Acesso: </h2>
<form action={{ route('app.login') }} method="post">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuário:</label>
    <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Você pode acessar com seu username ou e-mail</div>
    <br>
     {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha:</label>
    <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
    <br>
    {{ $errors->has('senha') ? $errors->first('senha') : '' }}
  </div>
  {{isset($erro) && $erro != '' ? $erro : ''}}
  <br>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>
</div>
@endsection
