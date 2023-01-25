<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//RUTA QUE DA DE ALTA UN PACIENTE
Route::post('/guardarPaciente', [adminController::class, 'altaPaciente'])->name('guardarPaciente');

//TODO
Route::get('/editar/{id}', [DatosController::class,'editar'])->name('editar');
Route::patch('/actualizarPaciente/{id}', [DatosController::class,'actualizaPaciente'])->name('actualizaPaciente');

//ESTE RUTA ELIMINA CUALQUIER TIPO DE USUARIO, BUSCA EL DNI QUE ES LA CLAVE PRIMARIA;
Route::delete('/borrarUsuario/{dni}', [adminController::class,'bajaPaciente'])->name('bajaPaciente');

//ESTA RUTA NOS MUESTRA UN FORMULARIO PARA DAR DE ALTA A LOS PACIENTES
Route::view('/altaPaciente','pacientes.altaPacientes')->name('altaPaciente');

//ESTA RUTA NOS MUESTRA A TODOS LOS PACIENTES, AQUI LOS MODIFICAMOS
Route::get('/modPacientes', [adminController::class,'muestraUsuarios'])->name('muestraUsuarios');
Route::view('/verPacientes','pacientes.verPacientes')->name('verPacientes');

