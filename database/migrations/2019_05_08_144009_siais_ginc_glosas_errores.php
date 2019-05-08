<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiaisGincGlosasErrores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siais_ginc_glosas_errores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('numero_sap_pagador');
            $table->string('nit_pagador');
            $table->string('razon_social_pagador');
            $table->string('codigo_asegurador');
            $table->string('numero_paquete');
            $table->bigInteger('numero_factura')->unsigned();
            $table->double('valor_factura');
            $table->string('fecha_factura');
            $table->bigInteger('episodio')->unsigned();
            $table->integer('estado_glosa_sap')->unsigned();
            $table->string('fecha_glosa');
            $table->string('fecha_recepcion_glosa_ips');
            $table->double('valor_objetado');
            $table->double('valor_aceptado_no_pago');
            $table->double('valor_no_aceptado_eps');
            $table->bigInteger('identificacion_paciente')->unsigned();
            $table->string('nombre_paciente');
            $table->string('usuario_sap');
            $table->uuid('uuid_carga')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siais_ginc_glosas_errores');
    }
}
