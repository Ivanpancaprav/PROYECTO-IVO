<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->id("id_informe");
            $table->text("observaciones");
            $table->date("fecha_creacion");
            $table->enum('tipo_informe',array('radiografia','analitica'));
            $table->integer('n_historia')->unsigned();
            $table->string('dni_medico',9);
            $table->foreign('dni_medico')->references('dni_medico')->on('medicos');
            $table->foreign('n_historia')->references('n_historia')->on('historias_clinicas');

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
        Schema::dropIfExists('informes');
    }
};
