<?php

namespace App\Http\Controllers;

use App\AppCliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'pesquisaClienteDevedor' => 'min:1',  // Validando para não ser possivel fazer uma pesquisa vazia
        ]);

        $consulta = "";

        // Entra se houver requisição. Se a consulta for feita, a solicitação não vai estar vazia
        if (count($request->all()) != 0) {
            if (isset($request->all()['todos'])) {  // Entra se o usuário pedir para listar todos os clientes
                $consulta = AppCliente::all();
            } else {
                $pesquisa = $request->all()['pesquisa'];

                $consulta = AppCliente::where('nome', 'like', "%$pesquisa%")  // Operarador LIKE do SQL (SELECT * FROM <tabela> WHERE <coluna> LIKE '%pesquisa%')
                                    ->orWhere('cpf', $pesquisa)
                                    ->orWhere('cnpj', $pesquisa)->get();
            }
        }

        return view('app.cliente.index', ['consulta' => $consulta]);
    }

    /**
     * Retorna o formulario que será preenchido
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Armazena os dados no banco passando os paramentros da REGEX
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Verifica algumas validações antes de enviar o formulario
        $request->validate([
            'tipo_pessoa' => 'required',
            'email' => 'required|unique:app_clientes',
            'logradouro' => 'required|max:30',
            'cep' => 'required|max:9',
            'bairro' => 'required|max:50',
            'cidade' => 'required|max:30',
            'estado' => 'required|max:20'
        ]);

        //REGEX que remove os caracteres da mascara JQUERY nos input's

        $dados = $request->all();  // Pegando todos os dados do request
        $dados['telefone'] = preg_replace('/[-() ]/', '', $dados['telefone']);
        $dados['cep'] = preg_replace('/[-]/', '', $dados['cep']);

        if ($dados['tipo_pessoa'] == 1) {  // Pessoa física
            $dados['cpf'] = preg_replace('/[.-]/', '', $dados['cpf']);
        } else {  // Pessoa jurídica
            $dados['cnpj'] = preg_replace('/[.\/-]/', '', $dados['cnpj']);
            $dados['telefoneResponsavel'] = preg_replace('/[-() ]/', '', $dados['telefoneResponsavel']);
        }


        

        AppCliente::create($dados);
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
