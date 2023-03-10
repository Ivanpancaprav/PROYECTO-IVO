<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/pacientes',[ApiController::class,'mostrarPacientes']);

Route::get('/medicos',[ApiController::class,'mostrarMedicos']);

Route::get('/medico/{dni}',[ApiController::class,'getMedico']);


Route::get('/perfil/{dni}',[ApiController::class,'mostrarPerfil']);

Route::get('/citas/{dni}/{role}', [ApiController::class,'mostrarCitas']); 

Route::get('/citasprev/{dni}/{role}', [ApiController::class,'mostrarCitasPrevias']); 


Route::get('/medicamentos', [ApiController::class,'mostrarMedicamentos']); 

Route::get('/medicamentos/{id_medicamentos}', [ApiController::class,'getMedicamentos']);

Route::get('/medicamentosborrar/{id_medicamentos}', [ApiController::class,'borrarMedicamentos']);

Route::get('/user/{dni}', [ApiController::class,'getUser']); 

Route::get('/informe/{id_informe}', [ApiController::class,'getInforme']); 


Route::get('/informes', [ApiController::class,'mostrarInformes']);

//RUTAS LOGGIN
Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class,'register']);

Route::group(['middleware' => 'auth:api'], function () {
        Route::get('details', [UserController::class,'details']);
        Route::get('logout', [UserController::class,'logout']);
});

//RUTAS CITAS

Route::post('/crea_cita',[ApiController::class,'creaCita']);
Route::delete('/borraCita/{id_cita}',[ApiController::class,'borraCita']);
Route::put('/citaUpdate/{id_cita}', [ApiController::class, 'citaUpdate']);
Route::get('/verCita/{id_cita}',[ApiController::class,'verCita']);


//RUTAS HISTORIAS M??DICAS

Route::post('/crea_historia',[ApiController::class,'historia_create']);
Route::delete('/borra_historia/{id_historia}',[ApiController::class,'borra_historia']);
Route::put('/update_historia/{id_historia}', [ApiController::class, 'update_historia']);
Route::get('/historiasclinicas', [ApiController::class,'mostrarHistoriasClinicas']); 


Route::get('/ver_historia/{id_historia}',[ApiController::class,'getHistoria']);
Route::get('/historias/{dni}',[ApiController::class,'getHistorias']);

Route::post('/set_medicamento_en_historia',[ApiController::class,'set_medicamendo_en_historia']);
Route::get('/get_medicamento_en_historia/{id}',[ApiController::class,'get_medicamentos_en_historia']);


//RUTAS INFORMES
Route::delete('/borrarinformes/{id_informe}', [ApiController::class,'borrarinformes']); 
Route::post('/crearInformes',[ApiController::class,'crearInformes']);

