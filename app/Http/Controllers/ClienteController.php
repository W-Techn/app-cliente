<?php

namespace App\Http\Controllers;

use App\AppCliente;
use App\AppDivida;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Retorna a listagem de clientes com base na pesquisa feita
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'pesquisaClienteDevedor' => 'min:1',  // Validando para não ser possivel fazer uma pesquisa vazia
        ]);

        $consulta = "";

        if (count($request->all()) != 0) {          // Entra se houver requisição. Se a consulta for feita, a solicitação não vai estar vazia
            if (isset($request->all()['todos'])) {  // Entra se o usuário pedir para listar todos os clientes
                $consulta = AppCliente::all()->toArray();
            } else {
                $pesquisa = $request->all()['pesquisa'];

                $consulta = AppCliente::where('nome', 'like', "%$pesquisa%")  // Operarador LIKE do SQL (SELECT * FROM <tabela> WHERE <coluna> LIKE '%pesquisa%')
                                ->orWhere('cpf', $pesquisa)
                                ->orWhere('cnpj', $pesquisa)
                                ->get()
                                ->toArray();
            }

            /*
            Pegando todos os clientes e adicionando um novo atributo (um arrray) de dívidas no array
            de cada cliente. Estou adicionando todas as dívidas de cada cliente no array. Se ele não
            tiver dívida o array é vazio; caso contrário o array vai ter as N dívidas dele.
            */
            foreach ($consulta as &$cliente) {
                $cliente['dividas'] = AppCliente::leftJoin('app_dividas', 'app_clientes.id', '=', 'app_dividas.cliente_id')
                                            ->where('app_dividas.cliente_id', $cliente['id'])
                                            ->get()
                                            ->toArray();
            }
        }

        return view('app.cliente.index', ['consulta' => $consulta]);
    }

    /**
     * Retorna os formulários que será preenchido
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Armazena os dados no banco passando os parametros da REGEX
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Verifica algumas validações antes de enviar o formulario
        $request->validate([
            'tipo_pessoa' => 'required',
            'email' => 'required|unique:app_clientes',
            'logradouro' => 'required|max:30',
            'cep' => 'required|max:9',
            'bairro' => 'required|max:50',
            'cidade' => 'required|max:30',
            'estado' => 'required|max:20'
        ]);

        /*
            Removendo caracteres quem vem das máscaras ('(', ')', '-', ' ', '.', '/') do jQuery usando expressão regular (REGEX).
            Função preg_replace(regex, valor a ser mudado, string para ser mudada)
                Exemplo de campo regex:
                    /[-() ]/ -> O regex vai procurar caracteres '-', '(', ')' e ' '
        */

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
     * @param  \App\AppCliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(AppCliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppCliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(AppCliente $cliente)
    {
        //
    }

    /**
     * Atualiza o campo de 'pagamento efetuado' na tabela de dívidas.
     ** @param  \Illuminate\Http\Request  $request
     * @param  int  $id_cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id_cliente)
    {
        /*
            Atualiza o campo de pagamento efetuado na tabela de dívidas e redireciona o usuário
            para a tela de pesquisar cliente, listando todos
         */
        AppDivida::where('id_divida', $request->input('id_divida'))->update(['pagamento_efetuado' => 1]);
        return redirect()->route('cliente.index', 'todos=true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppCliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppCliente $cliente)
    {
        //
    }
}
