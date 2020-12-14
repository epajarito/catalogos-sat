<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormaPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forma_pagos', function (Blueprint $table) {
            $table->string("id");
            $table->text('descripcion')->nullable();
            $table->string('bancarizado')->nullable();
            $table->string('numero_de_operacion')->nullable();
            $table->string('rfc_del_emisor_de_la_cuenta_ordenante')->nullable();
            $table->string('cuenta_ordenante')->nullable();
            $table->string('patron_para_cuenta_ordenante')->nullable();
            $table->string('rfc_del_emisor_cuenta_de_beneficiario')->nullable();
            $table->string('cuenta_de_benenficiario')->nullable();
            $table->string('patron_para_cuenta_beneficiaria')->nullable();
            $table->string('tipo_cadena_pago')->nullable();
            $table->string('nombre_del_banco_emisor_de_la_caso_de_extranjero')->nullable();
            $table->string('fecha_inicio_de_vigencia')->nullable();
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
        Schema::dropIfExists('forma_pagos');
    }
}
