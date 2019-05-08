<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TriggerGlosasProduccion extends Migration
{
    private $table = 'siais_ginc_glosas';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER "TriggerGlosasProduccion" BEFORE INSERT ON "public"."'.$this->table.'" FOR EACH ROW EXECUTE PROCEDURE "public"."analisis_datos"();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
