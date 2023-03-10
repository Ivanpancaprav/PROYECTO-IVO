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
        Schema::create('users', function (Blueprint $table) {
            $table->string("dni",9)->primary()->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre',50);
            $table->string('apellido1',50)->nullable();
            $table->string('apellido2',50)->nullable();
            $table->string('direccion',150)->nullable();
            $table->string('foto',150)->nullable();
            $table->string('email',150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('sexo',array('femenino','masculino'))->nullable();
            $table->enum('role',array('user','paciente','radiologo','medico','administrador'))->default('user');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('password');
            $table->rememberToken();
    
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
        Schema::dropIfExists('users');
    }
};
