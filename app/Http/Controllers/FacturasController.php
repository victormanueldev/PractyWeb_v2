<?php

namespace App\Http\Controllers;
use App\RecibosEgresos;
use App\Factura;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
        
        // ->where('fechaCreacion', '>=', '2018-02-23 00:00:00')
        // ->where('fechaCreacion', '<=', '2018-03-20 23:00:00')
        // $ventas_caja = DB::table('factura')
        //                 ->select(DB::raw('sum(totalFactura) as totalFactura,
        //                         sum(totalDescuentos) as totalDescuentos,
        //                         sum(valorEfectivo) as valorEfectivo,
        //                         sum(valorCredito) as valorCredito,
        //                         sum(valorDebito) as valorDebito,
        //                         sum(valorCheque) as valorCheque,
        //                         sum(valorCXC) as valorCXC,
        //                         sum(valorBono) as valorBono'))
        //                 ->where('fechaCreacion', '>=', $request->fecha_inicio)
        //                 ->where('fechaCreacion', '<=', $request->fecha_fin)
        //                 ->where('codigoUsuarioIngreso', '=', 17)
        //                 ->get();

        //Consulta los datos de la tabla factura
        $ventas_caja = Factura::select(
            'totalFactura', 
            'valorCredito', 
            'totalDescuentos', 
            'valorEfectivo', 
            'valorCredito',
            'valorDebito',
            'valorCheque',
            'valorCXC',
            'valorBono' 
            )
            ->where('fechaCreacion', '>=', $request->fecha_inicio)
            ->where('fechaCreacion', '<=', $request->fecha_fin)
            ->where('codigoUsuarioIngreso', '=', $request->numero_caja)
            ->get();

        //Consulta los datos de la tabla egresos
        $egresos = RecibosEgresos::select('valor')
                ->where('fechaIngreso', '>=', $request->fecha_inicio)
                ->where('fechaIngreso', '<=', $request->fecha_fin)
                ->where('usuarioIngreso', '=', $request->numero_caja)
                ->get();

        //Inicializacion de variables de Suma
        $suma_facturas = 0;
        $suma_descuentos = 0;
        $suma_efectivo = 0;
        $suma_creditos = 0;
        $suma_debitos = 0;
        $suma_cheques = 0;
        $suma_cxc = 0;
        $suma_bonos = 0;
        $suma_egresos = 0;
        
        //Recorre los datos de la consulta de Factura y suma los resultados
        foreach ($ventas_caja as $venta) {
            $suma_facturas += $venta->totalFactura;
            $suma_descuentos += $venta->totalDescuentos;
            $suma_efectivo += $venta->valorEfectivo;
            $suma_creditos += $venta->valorCredito;
            $suma_debitos += $venta->valorDebito;
            $suma_cheques += $venta->valorCheque;
            $suma_cxc += $venta->valorCXC;
            $suma_bonos += $venta->valorBono;
        }

        //Recorre los datos de la consulta de Egresos y suma los resultados
        foreach ($egresos as $item_egreso) {
            $suma_egresos += $item_egreso->valor;
        }

        $neto = $suma_facturas - $suma_egresos;
        //Instacia de la Coleccion
        $data = collect();

        //Añadir datos a la coleccion
        $data->push([
            'totalFactura' => $suma_facturas,
            'totalDescuentos' => $suma_descuentos,
            'valorEfectivo' => $suma_efectivo,
            'valorCredito' => $suma_creditos,
            'valorDebito' => $suma_debitos,
            'valorCheque' => $suma_cheques,
            'valorCXC' => $suma_cxc,
            'valorBono' => $suma_bonos,
            'totalEgresos' => $suma_egresos,
            'valorNeto' => $neto
        ]);

        //Convertir la coleccion a objeto JSON
        $data->toJson();
        return $data;
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
