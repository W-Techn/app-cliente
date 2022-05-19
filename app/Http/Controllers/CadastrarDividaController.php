<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastrarDividaController extends Controller
{
    public function cadastrar()
    {
        return view('app.cadastrar_divida');
    }
}
