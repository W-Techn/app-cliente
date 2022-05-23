
<div class="container mt-5 text-center">
    <h3>Cadastro de dívida para {{ $cliente->nome ?? $cliente->razaoSocial }}</h3>

    <form action="{{ route('divida.store') }}" class="row g-1 justify-content-center mt-3" method="POST">
        @csrf

        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">

        <div class="form-floating mb-3 col-md-6 me-1">
            <input type="text" name="nome_divida" class="form-control" id="floatingInput" placeholder="Nome" required>
            <label for="floatingInput">Nome</label>
        </div>

        <div class="form-floating mb-3 col-md-3">
            <input type="text" name="credor_divida" class="form-control" id="floatingInput" placeholder="Credor" required>
            <label for="floatingInput">Credor</label>
        </div>

        <div class="form-floating mb-3 col-md-3 me-1">
            <input type="text" name="valor_divida" class="form-control" id="valor_divida" placeholder="Valor" required>
            <label for="floatingInput">Valor</label>
        </div>

        <div class="form-floating mb-3 col-md-3 me-1">
            <input type="date" name="data_divida" class="form-control" id="floatingInput" placeholder="Data de vencimento" required>
            <label for="floatingInput">Data de vencimento</label>
        </div>

        <div class="form-floating mb-3 col-md-3">
            <input type="text" name="contrato_divida" class="form-control" id="floatingInput" placeholder="Contrato" required>
            <label for="floatingInput">Contrato</label>
        </div>

        <div class="form-floating mb-3 col-md-9">
            <textarea name="descricao_divida" class="form-control" id="floatingInput" placeholder="Descrição" rows="5" style="height:100%;" required></textarea>
            <label for="floatingInput">Descrição</label>
        </div>

        <div d-flex justify-content-center id="div-botao-cadastrar-divida">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
