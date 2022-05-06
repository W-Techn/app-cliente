<div class="container mt-5 text-center">
    <h1>Cadastro de pessoa física</h1>

    <form action="{{ route('app.clientes-cadastro') }}" class="row g-1 justify-content-center" method="POST">
        @csrf

        {{-- Informa o tipo de pessoa (PF=1 ou PJ=2) para o banco de dados --}}
        <input type="hidden" name="tipo_pessoa" value="1">

        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Nome" maxlength="50" required>
            <label for="floatingInput">Nome</label>
        </div>
        <div class="form-floating mb-3 col-md-3 ms-1">
            <input type="text" name="cpf" class="form-control" id="floatingInput" placeholder="CPF" maxlength="11" required>
            <label for="floatingInput">CPF</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email" maxlength="80" required>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3 col-md-3 ms-1">
            <input type="text" name="telefone" class="form-control" id="floatingInput" placeholder="Telefone" maxlength="20" required>
            <label for="floatingInput">Telefone</label>
        </div>
        <div class="form-floating mb-3 col-md-4 ms-1">
            <input type="text" name="logradouro" class="form-control" id="floatingInput" placeholder="Logradouro" maxlength="30" required>
            <label for="floatingInput">Logradouro</label>
        </div>
        <div class="form-floating mb-3 col-md-4 ms-1">
            <input type="text" name="bairro" class="form-control" id="floatingInput" placeholder="Bairro" maxlength="50" required>
            <label for="floatingInput">Bairro</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="text" name="cidade" class="form-control" id="floatingInput" placeholder="Cidade" maxlength="30" required>
            <label for="floatingInput">Cidade</label>
        </div>
        <div class="form-floating mb-3 col-md-3 ms-1">
            <input type="text" name="cep" class="form-control" id="floatingInput" placeholder="CEP" maxlength="8" required>
            <label for="floatingInput">CEP</label>
        </div>
        <div class="form-floating mb-3 col-md-8 ms-1">
            <input type="text" name="estado" class="form-control" id="floatingInput" placeholder="Estado" maxlength="20" required>
            <label for="floatingInput">Estado</label>
        </div>

        <div d-flex justify-content-cente>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
