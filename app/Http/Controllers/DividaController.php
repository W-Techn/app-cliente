<?php

namespace App\Http\Controllers;

use App\AppDivida;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DividaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.cadastrar_divida');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
