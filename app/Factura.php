<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $table = "factura";

    protected $fillable = [
        'codigo',
        'codigoTercero',
        'codigoComprobante',
        'fechaCreacion',
        'fechaEmision',
        'fechaVencimiento',
        'plazo',
        'fechaCancelada',
        'fechaAnulada',
        'codigoUsuarioIngreso',
        'codigoUsuarioAnulo',
        'codigoUsuarioCancelo',
        'estado',
        'pedido',
        'ordenCompra',
        'codigoVendedor',
        'remision',
        'observaciones',
        'descuentoPieFactura',
        'codigoCaja',
        'saldo',
        'totalFactura',
        'totalDescuentos',
        'totalExenta',
        'totalGravada',
        'iva',
        'iva16',
        'iva10',
        'iva19',
        'base16',
        'base10',
        'base19',
        'pagaCon',
        'devuelta',
        'reteIva',
        'reteIca',
        'reteFuente',
        'codigoFactura',
        'valorEfectivo',
        'valorCredito',
        'numeroTarjetaCredito',
        'valorDebito',
        'numeroTarjetaDebito',
        'valorCheque',
        'numeroCheque',
        'valorBono',
        'numeroBono',
        'valorCXC'
    ];

    
}
