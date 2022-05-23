<?php

namespace App\Http\Controllers;

use App\AppDivida;
use App\AppCliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DividaController extends Controller
{
    /**
     * Listagem de clientes com base na pesquisa feita
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $consulta = "";

        if (count($request->all()) != 0) {  // Entra se houver requisição
            $pesquisa = $request->all()['pesquisa'];

            $consulta = AppCliente::where('nome', 'like', "%$pesquisa%")
                            ->orWhere('cpf', 'like', "%$pesquisa%")
                            ->orWhere('cnpj', 'like', "%$pesquisa%")
                            ->orWhere('razaoSocial', 'like', "%$pesquisa%")
                            ->get();
        }

        return view('app.divida.index', ['consulta' => $consulta]);
    }

    /**
     * Retorna o formulário que será preenchido
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /* Manda por parâmetro o cliente escolhido pelo usuário para cadastrar a dívida. */
        $cliente = AppCliente::find($request->input('cliente'));
        return view('app.divida.create', ['cliente' => $cliente]);
    }

    /**
     * Armazena os dados no banco após passar pela validação e pelo REGEX
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var array Definindo as regras para validação dos campos. */
        $regras = [
            'nome_divida' => 'required',
            'valor_divida' => 'required',
            'data_divida' => 'required',
            'contrato_divida' => 'required',
            'credor_divida' => 'required',
            'descricao_divida' => 'required',
        ];

        $request->validate($regras);

        // Tirando caracteres da máscara do campo de valor e gravando no BD na tabela de dívidas:
        $dados = $request->all();
        $dados['valor_divida'] = preg_replace('/[.]/', '', $dados['valor_divida']);
        $dados['valor_divida'] = preg_replace('/[,]/', '.', $dados['valor_divida']);

        AppDivida::create($dados);
        return redirect()->route('app.paginainicial');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppDivida  $appDivida
     * @return \Illuminate\Http\Response
     */
    public function show(AppDivida $appDivida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppDivida  $appDivida
     * @return \Illuminate\Http\Response
     */
    public function edit(AppDivida $appDivida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppDivida  $appDivida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppDivida $appDivida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppDivida  $appDivida
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppDivida $appDivida)
    {
        //
    }
}
