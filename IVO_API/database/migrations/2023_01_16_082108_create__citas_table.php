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
            $table->timestamps();
            $table->enum('especialidad',array('Radiografia','Analitica'));
            $table->text('descripcion');
            $table->string("dni_paciente",9);
            $table->foreign('dni_paciente')->references('dni_paciente')->on('pacientes');
        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Citas');
    }
};
