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
            $table->enum('tratamiento',array('emergencia','consulta','hospitalizacion','medicina','oncologia','cirugia','traumatologia'));
            $table->text("progreso");
            $table->date("fecha_fin")->nullable();
            $table->date("fecha_inicio");
            $table->string("dni_paciente",9)->nullable();
            $table->string("dni_medico",9)->nullable();
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
