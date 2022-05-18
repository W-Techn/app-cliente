<div class="container mt-5 text-center">
    <h2>Cadastro de pessoa jurídica</h2>

    <form action="{{ route('cliente.store') }}" class="row g-1 justify-content-center" method="POST">
        @csrf

        {{-- Informa o tipo de pessoa (PF=1 ou PJ=2) para o banco de dados --}}
        <input type="hidden" name="tipo_pessoa" value="2">

        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="text" name="razaoSocial" class="form-control" id="floatingInput" placeholder="Razão social" maxlength="50" required>
            <label for="floatingInput">Razão social</label>
        </div>
        <div class="form-floating mb-3 col-md-2 ms-1">
            <input type="text" name="cnpj" class="form-control" id="cnpj" placeholder="CNPJ" maxlength="14" required>
            <label for="floatingInput">CNPJ</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email" maxlength="80" required>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3 col-md-2 ms-1">
            <input type="text" name="telefone" class="form-control" id="telefone_do_pj" placeholder="Telefone" maxlength="20" required>
            <label for="floatingInput">Telefone</label>
        </div>
        <div class="form-floating mb-3 col-md-7 ms-1">
            <input type="text" name="logradouro" class="form-control" id="floatingInput" placeholder="Logradouro" maxlength="30" required>
            <label for="floatingInput">Logradouro</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="text" name="bairro" class="form-control" id="floatingInput" placeholder="Bairro" maxlength="50" required>
            <label for="floatingInput">Bairro</label>
        </div>
        <div class="form-floating mb-3 col-md-2 ms-1">
            <input type="text" name="cep" class="form-control" id="cep_pj" placeholder="CEP" maxlength="8" required>
            <label for="floatingInput">CEP</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="text" name="cidade" class="form-control" id="floatingInput" placeholder="Cidade" maxlength="30" required>
            <label for="floatingInput">Cidade</label>
        </div>
        <div class="form-floating mb-3 col-md-2 ms-1">
            <input type="text" name="estado" class="form-control" id="floatingInput" placeholder="Estado" maxlength="20" required>
            <label for="floatingInput">Estado</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="text" name="nomeResponsavel" class="form-control" id="floatingInput" placeholder="Nome responsável" maxlength="50" required>
            <label for="floatingInput">Nome responsável</label>
        </div>
        <div class="form-floating mb-3 col-md-2 ms-1">
            <input type="text" name="telefoneResponsavel" class="form-control" id="telefone_responsavel" placeholder="Telefone responsável" maxlength="20" required>
            <label for="floatingInput">Telefone responsável</label>
        </div>

        <div d-flex justify-content-center id="div-botao-cliente-PJ">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
