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
            $table->string('apellido1',50);
            $table->string('apellido2',50)->nullable();
            $table->string('direccion',150);
            $table->string('email',150)->unique();

            $table->timestamp('email_verified_at')->nullable();
            $table->enum('sexo',array('femenino','masculino'));
            $table->enum('role',array('paciente','padiologo','medico','administrador'));
            $table->date('fecha_nacimiento');
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
