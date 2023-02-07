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
        Schema::create('medicamentos_recetados', function (Blueprint $table) {
            $table->id('id_receta');
            $table->string('dni_medico',9);
            $table->integer('id_medicamento')->unsigned();
            $table->date("fecha_receta");
            $table->foreign('id_medicamento')->references('id_medicamento')->on('medicamentos');
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
        Schema::dropIfExists('Medicamentos_Recetados');
    }
};
