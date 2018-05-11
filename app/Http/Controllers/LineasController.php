<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LineasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lineas = DB::table('lineas')->get();
        return $lineas;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(!empty($request->codigoLinea) || $request==''){
            $datos_kardex = DB::table('kardex')
                            ->join('lineas', 'kardex.codigoLinea', '=', 'lineas.codigo')
                            ->select('lineas.nombre', 'kardex.*')
                            ->where('codigoCaja', '!=', 0)
                            ->where('categoriaComprobante', 'VENTAS')
                            ->where('transaccion', 'SALIDA')
                            ->whereBetween('fechaCreacionDocumento', [$request->fecha_inicio, $request->fecha_fin])
                            ->where('codigoLinea', $request->codigoLinea)
                            ->get();
                                    
            $suma_item_consulta = 0;
            $suma_cantidad = 0;
            $suma_costos = 0;
            foreach ($datos_kardex as $kardex) {
                $suma_item_consulta += $kardex->precioVenta*$kardex->cantidad;
                $suma_cantidad+= $kardex->cantidad;
                $suma_costos += $kardex->costoPromedio*$kardex->cantidad;
            }

            $data = collect();
            $data->push([
                ''
            ]);
        }else{            
            $datos_kardex = DB::table('kardex')
                            ->join('lineas', 'kardex.codigoLinea', '=', 'lineas.codigo')
                            ->select(DB::raw('sum(kardex.precioVenta*kardex.cantidad) as suma_item_consulta, sum(kardex.cantidad) as suma_cantidad, sum(kardex.costoPromedio*kardex.cantidad) as suma_costos, lineas.nombre'))
                            ->where('codigoCaja', '!=', 0)
                            ->where('categoriaComprobante', 'VENTAS')
                            ->where('transaccion', 'SALIDA')
                            ->whereBetween('fechaCreacionDocumento', ['2018-02-23', '2018-05-11'])
                            ->groupBy('lineas.nombre')
                            ->get();
        }

        return $datos_kardex;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
