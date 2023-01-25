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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->string("dni_paciente",9)->primary();
            $table->foreign("dni_paciente")->references("dni")->on("users")->onDelete('cascade')->onUpdate('cascade');

               //ATRIBUTOS DEL PACIENTE
               $table->integer('n_seguridad_social');
               $table->integer('n_historial_clinico');
               //FIN ATRIBUTOS DEL PACIENTE
   

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
        Schema::dropIfExists('pacientes');
    }
};
