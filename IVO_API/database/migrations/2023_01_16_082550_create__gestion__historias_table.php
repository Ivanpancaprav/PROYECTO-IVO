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
        Schema::create('gestion_historias', function (Blueprint $table) {
            
            $table->id("n_gestion_historias");
            $table->string("dni_medico",9);
            $table->integer("n_historia")->unsigned();

            $table->foreign('dni_medico')->references('dni_medico')->on('medicos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('n_historia')->references('n_historia')->on('historias_clinicas')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('Gestion_Historias');
    }
};
