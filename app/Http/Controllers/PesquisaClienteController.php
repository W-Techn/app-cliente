<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppCliente;

class PesquisaClienteController extends Controller
{
    /**
     * Com base na requisição feita, pesquisa no banco de dados o cliente correspondente.
     *
     * @param Request $request
     * @return view A view da pesquisa do cliente e os dados da pesquisa
     */
    public function pesquisar(Request $request)
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

        return view('app.pesquisa_cliente', ['consulta' => $consulta]);
    }
}
