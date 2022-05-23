    @extends('app.layouts._components.cadastro_de_usuario')


    @section('css')
    {{--link css--}}
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @endsection

    @section('JS')
    {{--link js--}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @endsection

        @section('inicio')
        {{--inclusão da barra de navegação--}}
        @include("app.layouts._partials.barra_de_navegacao") 
    @endsection

    @section('rodapé')
    {{--inclusão do rodapé--}}
    @include("app.layouts._partials.rodape")
    @endsection

    @section('formulário') 
     
        <div style="text-align:center">
        <div class="container mt-5">
        <h2>Cadastro de usuarios</h2>  
             
        <form action={{ route('app.cadastro-usuario') }} method="post" class="row g-3">
        @csrf
        
        <div class="col-md-6">
        <label for="nome" class="nome">Nome</label> 
        <input type="text" class="form-control" id="nome" placeholder="Digite o nome completo..." required>
        </div>

        <div class="col-md-6">
        <label for="email" class="email">E-mail</label> 
        <input type="text" class="form-control" id="email" placeholder="Email@email.com" required>
        </div>
        
        <div class="col-md-2">
        <label for="dataNasc" class="DataNasc">Data de nascimento</label> 
        <input type="text" class="form-control" id="dataNasc" placeholder="00/00/0000" required>
        </div>

        <div class="col-md-4">
        <label for="logradouro" class="logradouro">Logradouro</label> 
        <input type="text" class="form-control" id="logradouro" placeholder="Digite o logradouro" required>
        </div>

        <div class="col-md-3">
        <label for="bairro" class="bairro">Bairro</label> 
        <input type="text" class="form-control" id="bairro" placeholder="Digite o bairro" required>
        </div> 
        {{--botão de envio--}}
        <div class="col-md-3">
        <label for="cidade" class="cidade">Cidade</label> 
        <input type="text" class="form-control" id="cidade" placeholder="São Paulo" required>
        </div>

        <div class="col-md-1">
        <label for="estado" class="estado">Estado</label> 
        <input type="text" class="form-control" id="estado" placeholder="SP" required>
        </div>

        <div class="col-md-3">
        <label for="cep" class="cep">Cep</label> 
        <input type="text" class="form-control" id="cep" placeholder="00000-000" required>
        </div>

        <div class="col-md-4">
        <label for="telefoneResi" class="TelefoneResi">Telefone residêncial</label> 
        <input type="text" class="form-control" id="telefoneResi" placeholder="(11) 0000-0000" required>
        </div>

        <div class="col-md-4">
        <label for="telefoneCel" class="telefoneCel">Telefone celular</label> 
        <input type="text" class="form-control" id="telefoneCel" placeholder="(11) 00000-0000" required>
        </div>

        <div class="col-md-6">
        <label for="senha" class="senha">Senha</label> 
        <input type="text" class="form-control" id="senha" placeholder="Digite uma senha..." required>
        </div>

        <div class="col-md-6">
        <label for="nomelogin" class="nomelogin">Login</label> 
        <input type="text" class="form-control" id="nomelogin" placeholder="Digite um nome para login..." required>
         </div>

         {{--select tipo de acesso, se escolher usuário=1 no banco, se escolher admin=0 no banco--}}
        <div style="text-align:center">
        <select class="form-select" aria-label="Default select example">
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
