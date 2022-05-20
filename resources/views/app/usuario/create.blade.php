    <div>
        <div>
            <form action={{ route('usuario.store') }} method="post">
                @csrf
                <select name="type">
                    <option value="">Tipo de perfil ?</option>
                    <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>Comun</option>
                    <option value="2" {{ old('type') == 2 ? 'selected' : '' }}>Administrador</option>
                </select>
                <input name="name" value="{{ old('name')}}" type="text" placeholder="Nome Completo">
                <br>
                <input name="username" value="{{ old('username') }}" type="text" placeholder="Apelido">
                <br>
                <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail">
                <br>
                <input name="password" value="{{ old('password') }}" type="text" placeholder="Senha">
                <br>
                <br>
                <button type="submit">ENVIAR</button>
            </form>
        </div>
    </div>
</div>