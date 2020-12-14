<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigoPostalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_postales', function (Blueprint $table) {
            $table->string('id');
            $table->string('c_estado')->nullable();
            $table->string('c_municipio')->nullable();
            $table->string('c_localidad')->nullable();
            $table->string('estimulo_franja_fronteriza')->nullable();
            $table->string('fecha_inicio_de_vigencia_del_estimulo')->nullable();
            $table->string('fecha_fin_de_vigencia_del_estimulo')->nullable();
            $table->string('referencias_del_huso_horario')->nullable();
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
        Schema::dropIfExists('codigo_postales');
    }
}
