    <div>
        <div>
            <form method="post" action="{{ route('usuario.update', ['usuario' => $usuario->id]) }}">
                @csrf
                @method('PATCH')
                <input name="nome" value="{{ $usuario->nome ?? old('name')}}" type="text" placeholder="Nome Completo">
                <br>
                <input name="nome_login" value="{{ $usuario->nome_login ?? old('username') }}" type="text" placeholder="Apelido">
                <br>
                <input name="email" value="{{ $usuario->email ?? old('email') }}" type="text" placeholder="E-mail">
                <br>
                <input name="senha" value="{{ old('senha') }}" type="password" placeholder="Senha">
                <br>
                <input name="codigo" value="{{ $usuario->codigo }}" type="hidden">
                <br>
                <br>
                <button type="submit">ENVIAR</button>
            </form>
        </div>
    </div>
</div>