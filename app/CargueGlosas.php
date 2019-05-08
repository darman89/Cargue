<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargueGlosas extends Model
{
    protected $table = 'siais_ginc_glosas_cargue';

    public $timestamps = false;

    protected $fillable = [
        'numero_sap_pagador',
        'nit_pagador',
        'razon_social_pagador',
        'codigo_asegurador',
        'numero_paquete',
        'numero_factura',
        'valor_factura',
        'fecha_factura',
        'episodio',
        'estado_glosa_sap',
        'fecha_glosa',
        'fecha_recepcion_glosa_ips',
        'valor_objetado',
        'valor_aceptado_no_pago',
        'valor_no_aceptado_eps',
        'identificacion_paciente',
        'nombre_paciente',
        'usuario_sap',
        'uuid_carga',
    ];

}
