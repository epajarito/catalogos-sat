<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseCfdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uso_cfdis', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->text('descripcion');
            $table->string('aplica_para_tipo_persona_fisica');
            $table->string('aplica_para_tipo_persona_moral');
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
        Schema::dropIfExists('uso_cfdis');
    }
}
