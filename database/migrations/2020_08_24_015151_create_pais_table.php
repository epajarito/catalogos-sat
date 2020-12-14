<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->string("id");
            $table->text('descripcion')->nullable();
            $table->string('formato_de_codigo_postal')->nullable();
            $table->string('formato_de_registro_de_identidad_tributaria')->nullable();
            $table->string('validacion_del_registro_de_identidad_tributaria')->nullable();
            $table->string('agrupaciones')->nullable();
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
        Schema::dropIfExists('paises');
    }
}
