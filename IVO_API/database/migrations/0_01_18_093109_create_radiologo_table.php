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
        Schema::create('radiologos', function (Blueprint $table) {
            $table->string("dni_radiologo",9)->primary();
            $table->enum('especialidad',array('tomografia','resonancia','mri','mamografia'));
            $table->foreign("dni_radiologo")->references("dni")->on("users");
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
        Schema::dropIfExists('radiologos');
    }
};
