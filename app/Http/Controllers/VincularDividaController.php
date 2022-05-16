<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VincularDividaController extends Controller
{
    public function vincular()
    {
        return view('app.vincular_divida');
    }
}
