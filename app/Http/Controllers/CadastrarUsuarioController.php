<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastrarUsuarioController extends Controller
{
    public function cadastrarusuario() {
        return view('app.cadastrarusuario');
    }
}
