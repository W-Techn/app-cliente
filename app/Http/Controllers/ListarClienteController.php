<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListarClienteController extends Controller
{
    public function listarcliente()
    {
        return view('app.listarcliente');
    }
}
