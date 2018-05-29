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
        //Inicializacion de Variables
        $suma_item_consulta = 0;
        $suma_cantidad = 0;
        $suma_costos = 0;
        $utilidad = 0;
        $data = collect();
        //validacion del request CodigoLinea vacio
        if(!empty($request->codigoLinea) || $request==''){
            ///Consulta a la DB del Kardex con todos las condiciones
            $datos_kardex = DB::table('kardex')
                            ->join('lineas', 'kardex.codigoLinea', '=', 'lineas.codigo')
                            ->select('lineas.nombre', 'kardex.precioVenta', 'kardex.cantidad', 'kardex.costoPromedio')
                            ->where('codigoCaja', '!=', 0)
                            ->where('categoriaComprobante', 'VENTAS')
                            ->where('transaccion', 'SALIDA')
                            ->whereBetween('fechaCreacionDocumento', [$request->fecha_inicio, $request->fecha_fin])
                            ->where('codigoLinea', $request->codigoLinea)
                            ->get();
            //Suma los valores de la consulta                        
            foreach ($datos_kardex as $kardex) {
                $suma_item_consulta += $kardex->precioVenta*$kardex->cantidad;
                $suma_cantidad+= $kardex->cantidad;
                $suma_costos += $kardex->costoPromedio*$kardex->cantidad;
                $utilidad += $kardex->precioVenta-$kardex->costoPromedio;

            }
            //Organiza los datos de las sumas en una coleccion
            $data->push([
                'total_ventas' => number_format($suma_item_consulta, 3, ",", "."),
                'cantidad_total' => $suma_cantidad,
                'costo_total' => number_format($suma_costos,3, ",", "."),
                'utilidad' => number_format($utilidad,3, ",", "."),
                'nombre_linea' => $kardex->nombre
            ]);
            return $data;

        }else{
            //Consulta a la DB en el Kardex sin parametros           
            $datos_kardex = DB::table('kardex')
                            ->join('lineas', 'kardex.codigoLinea', '=', 'lineas.codigo')
                            ->select(DB::raw(
                                'sum(kardex.precioVenta*kardex.cantidad) as total_ventas, 
                                sum(kardex.cantidad) as cantidad_total, 
                                sum(kardex.costoPromedio*kardex.cantidad) as costo_total,
                                sum(kardex.precioVenta-kardex.costoPromedio) as utilidad,
                                lineas.nombre as nombre_linea'))
                            ->where('codigoCaja', '!=', 0)
                            ->where('categoriaComprobante', 'VENTAS')
                            ->where('transaccion', 'SALIDA')
                            ->whereBetween('fechaCreacionDocumento', [$request->fecha_inicio, $request->fecha_fin])
                            ->groupBy('lineas.nombre')
                            ->get();
            //Organiza los datos en una Coleccion
            foreach ($datos_kardex as $dato) {
                $data->push([
                    'total_ventas' => number_format($dato->total_ventas, 3, ",", "."),
                    'cantidad_total' => $dato->cantidad_total,
                    'costo_total' => number_format($dato->costo_total, 3, ",", "."),
                    'utilidad' => number_format($dato->utilidad, 3, ",", "."),
                    'nombre_linea' => $dato->nombre_linea
                ]);
            }
            return $data;
        }

        return response()->json(['Error en la consulta al servidor', 400]);
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
