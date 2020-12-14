<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegimenFiscalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regimen_fiscales', function (Blueprint $table) {
            $table->string("id");
            $table->text('descripcion')->nullable();
            $table->string('fisica')->nullable();
            $table->string('moral')->nullable();
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
        Schema::dropIfExists('regimen_fiscales');
    }
}
