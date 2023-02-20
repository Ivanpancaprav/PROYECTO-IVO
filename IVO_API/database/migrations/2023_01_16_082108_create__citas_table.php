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
        Schema::create('citas', function (Blueprint $table) {
            
            $table->increments("id_cita");
            $table->date("fecha_creacion");
            $table->dateTime("fecha_fin");
            $table->timestamps();
            $table->enum('especialidad',array('radiografia','analitica','oncologia'));
            $table->text('descripcion');
            $table->string("dni_paciente",9)->nullable();
            $table->foreign('dni_paciente')->references('dni_paciente')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');
            $table->string("dni_medico",9)->nullable();
            $table->foreign('dni_medico')->references('dni_medico')->on('medicos')->onDelete('cascade')->onUpdate('cascade');
        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};
