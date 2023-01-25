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
        Schema::create('medicos', function (Blueprint $table) {
            $table->string("dni_medico",9)->primary();            $table->foreign("dni_medico")->references("dni")->on("users");
            $table->timestamps();
    
            //ATRIBUTOS DEL MEDICO
            $table->string('n_colegiado')->nullable();
            //FIN ATRIBUTOS DEL MEDICO
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
};
