    <div>
        <div>
        
            <table border="1">
                <tr>
                    <td>Nome:</td>
                    <td>{{ $usuario->nome }}</td>
                </tr>  
                <tr>
                    <a href="{{ route('usuario.edit', ['usuario' => $usuario]) }}">Editar</a>
                </tr>
            </table>
        
        </div>
    </div>
</div>