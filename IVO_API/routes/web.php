<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HistoriasClinicaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PedirCitaController;
use App\Htttp\Controllers\MedicamentosController;

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

//RUTAS LOGIN
Route::view('/', 'auth.login')->name('logear');
Route::post('/login-usuario', [AuthController::class, 'login'])->name('login');
Route::view('/registrar', 'auth.registrar');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//GRUPO RUTAS ADMIN

// Route::group(['middleware' => 'administrador'], function(){
    
    Route::get('/admin',[AuthController::class,'admin'])->name('admin');

    //*****RUTAS PACIENTES *****//

    Route::resource('pacientes', PacienteController::class);


    //*****RUTAS MEDICOS *****//
 
    Route::resource('medicos', MedicoController::class);
 
    //*****RUTAS CREAR CITAS *****//
 
    Route::resource('cita', PedirCitaController::class);
 
    //*****RUTAS CREAR HISTORIAS MEDICAS *****//
 
    Route::resource('historias_medicas', HistoriasClinicaController::class);
 
    //*****RUTAS MEDICAMENTOS *****//
 
    Route::resource('medicamentos', MedicamentosController::class);

    //*****RUTAS IMAGENES *****//
    
    Route::get('/images/{filename}', function ($filename)

    {
    $path = storage_path('app/images/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
    });
