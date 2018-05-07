<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    //
    protected $table = 'caja';

    protected $fillable = [
        'codigo',
        'codigoUsuario',
        'montoInicial',
        'montoFinal',
        'fechaApertura',
        'fechaCierre',
        'estado',
        'codigoComprobante',
        'consecutivo',
        'totalRecaudo',
        'totalCosto'
    ];
}
