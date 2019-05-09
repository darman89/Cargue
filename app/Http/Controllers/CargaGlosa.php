<?php

namespace App\Http\Controllers;

use App\Imports\GlosasImport;
use App\Jobs\ProcessGlosaUpload;
use Excel;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CargaGlosa extends Controller
{
    //
    public function loadGlosa()
    {
        (new GlosasImport)->queue('carga_glosas.csv', 'minio', \Maatwebsite\Excel\Excel::CSV);
        return dd('Importación Exitosa!');
    }
}
