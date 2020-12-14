<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaveProductoServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clave_producto_servicios', function (Blueprint $table) {
            $table->string("id");
            $table->text('descripcion')->nullable();
            $table->string('incluir_iva_trasladado')->nullable();
            $table->string('incluir_ieps_trasladado')->nullable();
            $table->string('complemento_que_debe_incluir')->nullable();
            $table->string('fecha_inicio_de_vigencia')->nullable();
            $table->string('fecha_fin_de_vigencia')->nullable();
            $table->string('estimulo_franja_fronteriza')->nullable();
            $table->text('palabras_similares')->nullable();
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
        Schema::dropIfExists('clave_producto_servicios');
    }
}
