    <div>
        <div>
            <form method="post" action="{{ route('usuario.update', ['usuario' => $usuario->id]) }}">
                @csrf
                @method('PATCH')
                <input name="name" value="{{ $usuario->nome ?? old('name')}}" type="text" placeholder="Nome Completo">
                <br>
                <input name="username" value="{{ $usuario->nome_login ?? old('username') }}" type="text" placeholder="Apelido">
                <br>
                <input name="email" value="{{ $usuario->email ?? old('email') }}" type="text" placeholder="E-mail">
                <br>
                <input name="password" value="{{ old('password') }}" type="password" placeholder="Senha">
                <br>
                <input name="codigo" value="{{ $usuario->codigo }}" type="hidden">
                <br>
                <br>
                <button type="submit">ENVIAR</button>
            </form>
        </div>
    </div>
</div>