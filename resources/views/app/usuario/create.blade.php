    @extends('app.layouts._components.cabecalho_e_rodape')


      @section('conteudo')
      @section('titulo', 'Cadastro de usuários')

        <div style="text-align:center">
        <div class="container mt-5">
        <h2>Cadastro de usuarios</h2>

        <form action={{ route('usuario.store') }} method="post" class="row g-3">
        @csrf

        <div class="col-md-6">
        <label for="nome" class="nome">Nome</label>
        <input name="nome" type="text" class="form-control" id="nome" placeholder="Digite o nome completo..." required>
        </div>

        <div class="col-md-6">
        <label for="email" class="email">E-mail</label>
        <input name="email" type="text" class="form-control" id="email" placeholder="Email@email.com" required>
        </div>

        <div class="col-md-2">
        <label for="data_nascimento" class="data_nascimento">Data de nascimento</label>
        <input name="data_nascimento" type="date" class="form-control" id="data_nascimento" placeholder="00/00/0000" required>
        </div>

        <div class="col-md-4">
        <label for="logradouro" class="logradouro">Logradouro</label>
        <input name="logradouro" type="text" class="form-control" id="logradouro" placeholder="Digite o logradouro" required>
        </div>

        <div class="col-md-3">
        <label for="bairro" class="bairro">Bairro</label>
        <input name="bairro" type="text" class="form-control" id="bairro" placeholder="Digite o bairro" required>
        </div>
        {{--botão de envio--}}
        <div class="col-md-3">
        <label for="cidade" class="cidade">Cidade</label>
        <input name="cidade" type="text" class="form-control" id="cidade" placeholder="São Paulo" required>
        </div>

        <div class="col-md-1">
        <label for="estado" class="estado">Estado</label>
        <input name="estado" type="text" class="form-control" id="estado" placeholder="SP" required>
        </div>

        <div class="col-md-3">
        <label for="cep" class="cep">Cep</label>
        <input name="cep" type="text" class="form-control" id="cep_usuario" placeholder="00000-000" required>
        </div>

        <div class="col-md-4">
        <label for="telefoneResi" class="TelefoneResi">Telefone residêncial</label>
        <input name="telefone_residencial" type="text" class="form-control" id="telefone_residencial_usuario" placeholder="(11) 0000-0000">
        </div>

        <div class="col-md-4">
        <label for="telefoneCel" class="telefoneCel">Telefone celular</label>
        <input name="telefone_celular" type="text" class="form-control" id="telefone_celular_usuario" placeholder="(11) 00000-0000" required>
        </div>

        <div class="col-md-6">
        <label for="senha" class="senha">Senha</label>
        <input name="senha" type="text" class="form-control" id="senha" placeholder="Digite uma senha..." required>
        </div>

        <div class="col-md-6">
        <label for="nomelogin" class="nomelogin">Login</label>
        <input name="nome_login" type="text" class="form-control" id="nomelogin" placeholder="Digite um nome para login..." required>
         </div>

         {{--select tipo de acesso, se escolher usuário=1 no banco, se escolher admin=0 no banco--}}
        <div style="text-align:center">
        <select name="tipo_acesso" class="form-select" aria-label="Default select example" required>
        <option selected>Tipo de acesso:</option>
        <option value="0">Administrador</option>
        <option value="1">Usuário</option>
        </select>
        </div>

        <div>
        <button class="btn btn-primary mb-4"  role="button" type="submit" class="btn btn-primary btn-sm">Cadastrar</button>

        </div>

         </form>
         </div>
         </div>
         @endsection
