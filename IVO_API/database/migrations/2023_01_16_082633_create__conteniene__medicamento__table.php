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
        Schema::create('contiene_medicamentos', function (Blueprint $table) {
            
            $table->id("id_contiene_medicamentos");
            $table->integer("n_historia")->unsigned();
            $table->integer('id_medicamento')->unsigned();
            $table->string("dosis")->nullable();
            $table->date("fecha_receta")->nullable();
            $table->date("fecha_fin")->nullable();
            $table->text("comentario")->nullable();
            $table->foreign('n_historia')->references('n_historia')->on('historias_clinicas');
            $table->foreign('id_medicamento')->references('id_medicamento')->on('medicamentos');
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
        Schema::dropIfExists('Contiene_Medicamento');
    }
};
