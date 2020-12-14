<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasaOCuotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasa_o_cuota', function (Blueprint $table) {
            $table->id();
            $table->string('rango_o_fijo');
            $table->double('minimo')->nullable();
            $table->double('maximo')->nullable();
            $table->string('impuesto');
            $table->string('factor');
            $table->string('traslado');
            $table->string('retencion');
            $table->string('fecha_inicio_de_vigencia');
            $table->string('fecha_fin_de_vigencia')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasa_o_cuota');
    }
}
