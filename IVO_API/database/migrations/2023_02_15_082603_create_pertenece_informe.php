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
        Schema::create('pertenece_informe', function (Blueprint $table) {
            $table->date("fecha");
            $table->integer("id_informe")->unsigned();
            $table->integer("n_historia")->unsigned();
            $table->increments("id_pertenece_informe");
            $table->timestamps();
            $table->foreign('n_historia')->references('n_historia')->on('historias_clinicas');
            $table->foreign('id_informe')->references('id_informe')->on('informes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertenece_informe');
    }
};



