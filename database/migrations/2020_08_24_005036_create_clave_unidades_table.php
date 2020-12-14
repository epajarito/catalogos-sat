<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaveUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clave_unidades', function (Blueprint $table) {
            $table->string('id');
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('nota')->nullable();
            $table->string('fecha_inicio_de_vigencia')->nullable();
            $table->string('fecha_fin_de_vigencia')->nullable();
            $table->string('simbolo')->nullable();
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
        Schema::dropIfExists('clave_unidades');
    }
}
