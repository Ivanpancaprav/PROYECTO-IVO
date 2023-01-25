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
        Schema::create('historias_clinicas', function (Blueprint $table) {
            $table->increments("n_historia");
            $table->text("tratamiento");
            $table->date("fecha_fin");
            $table->date("fecha_inicio");
            $table->string("dni_paciente",9);
            $table->string("dni_medico",9);
            $table->foreign('dni_paciente')->references('dni_paciente')->on('pacientes');
            $table->foreign('dni_medico')->references('dni_medico')->on('medicos');


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
        Schema::dropIfExists('Historias_clinicas');
    }
};
