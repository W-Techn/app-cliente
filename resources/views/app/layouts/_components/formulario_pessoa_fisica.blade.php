<div class="container mt-5 text-center">
    <h2>Cadastro de pessoa física</h2>

    <form action="{{ route('cliente.store') }}" class="row g-1 justify-content-center" method="POST">
        @csrf

        {{-- Informa o tipo de pessoa (PF=1 ou PJ=2) para o banco de dados --}}
        <input type="hidden" name="tipo_pessoa" value="1">

        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Nome"  required>
            <label for="floatingInput">Nome</label>
        </div>
        <div class="form-floating mb-3 col-md-3 ms-1">
            <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF"  required>
            <label for="floatingInput">CPF</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email"  required>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3 col-md-3 ms-1">
            <input type="text" name="telefone" class="form-control" id="telefone_pf" placeholder="Telefone"  required>
            <label for="floatingInput">Telefone</label>
        </div>
        <div class="form-floating mb-3 col-md-4 ms-1">
            <input type="text" name="logradouro" class="form-control" id="floatingInput" placeholder="Logradouro"  required>
            <label for="floatingInput">Logradouro</label>
        </div>
        <div class="form-floating mb-3 col-md-4 ms-1">
            <input type="text" name="bairro" class="form-control" id="floatingInput" placeholder="Bairro"  required>
            <label for="floatingInput">Bairro</label>
        </div>
        <div class="form-floating mb-3 col-md-5 ms-1">
            <input type="text" name="cidade" class="form-control" id="floatingInput" placeholder="Cidade"  required>
            <label for="floatingInput">Cidade</label>
        </div>
        <div class="form-floating mb-3 col-md-3 ms-1">
            <input type="text" name="cep" class="form-control" id="cep_pf" placeholder="CEP" required>
            <label for="floatingInput">CEP</label>
        </div>
        <div class="form-floating mb-3 col-md-8 ms-1">
            <input type="text" name="estado" class="form-control" id="floatingInput" placeholder="Estado"  required>
            <label for="floatingInput">Estado</label>
        </div>

        <div d-flex justify-content-center id="div-botao-cliente-PF">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>

