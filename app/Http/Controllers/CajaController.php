<?php

namespace App\Http\Controllers;

use App\Caja;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cajas = Caja::select('codigoUsuario')->groupBy('codigoUsuario')->get();
        return $cajas;
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
     * @param  \App\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function show($caja)
    {
        //
        $caja = Caja::where('codigoUsuario', $caja)->get();
        return $caja;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function edit($caja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $caja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caja  $caja
     * @return \Illuminate\Http\Response
     */
    public function destroy($caja)
    {
        //
    }
}
