<?php

namespace App\Imports;

use App\CargueGlosas;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;
use Ramsey\Uuid\Uuid;

class GlosasImport implements ToModel, WithHeadingRow, WithCustomCsvSettings, WithEvents
{
    use Importable, RegistersEventListeners;

    public static $uuid;
    /**
     * GlosasImport constructor.
     */
    public function __construct()
    {
        self::$uuid = Uuid::uuid4();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CargueGlosas([
            'numero_sap_pagador' => $row['numero_sap_pagador'],
            'nit_pagador' => $row['nit_pagador'],
            'razon_social_pagador' => $row['razon_social_pagador'],
            'codigo_asegurador' => $row['codigo_asegurador'],
            'numero_paquete' => $row['numero_paquete'],
            'numero_factura' => $row['numero_factura'],
            'valor_factura' => $row['valor_factura'],
            'fecha_factura' => $row['fecha_factura'],
            'episodio' => $row['episodio'],
            'estado_glosa_sap' => $row['estado_glosa_sap'],
            'fecha_glosa' => $row['fecha_glosa'],
            'fecha_recepcion_glosa_ips' => $row['fecha_recepcion_glosa_ips'],
            'valor_objetado' => $row['valor_objetado'],
            'valor_aceptado_no_pago' => $row['valor_aceptado_no_pago'],
            'valor_no_aceptado_eps' => $row['valor_no_aceptado_eps'],
            'identificacion_paciente' => $row['identificacion_paciente'],
            'nombre_paciente' => $row['nombre_paciente'],
            'usuario_sap' => $row['usuario_sap'],
            'uuid_carga' => self::$uuid,
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'delimiter' => ';'
        ];
    }

    public static function afterImport(AfterImport $event)
    {
        (\DB::select('SELECT iniciar_analisis(:uuid)',['uuid' => self::$uuid]));
    }
}
