<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PedirCitaController;
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
// Route::post('/guardarPaciente', [adminController::class, 'altaPaciente'])->name('guardarPaciente');

//TODO
// Route::get('/editar/{id}', [DatosController::class,'editar'])->name('editar');
// Route::patch('/actualizarPaciente/{id}', [DatosController::class,'actualizaPaciente'])->name('actualizaPaciente');

//ESTE RUTA ELIMINA CUALQUIER TIPO DE USUARIO, BUSCA EL DNI QUE ES LA CLAVE PRIMARIA;
// Route::delete('/borrarUsuario/{dni}', [adminController::class,'bajaPaciente'])->name('bajaPaciente');

//ESTA RUTA NOS MUESTRA UN FORMULARIO PARA DAR DE ALTA A LOS PACIENTES
// Route::view('/altaPaciente','pacientes.altaPacientes')->name('altaPaciente');

//ESTA RUTA NOS MUESTRA A TODOS LOS PACIENTES, AQUI LOS MODIFICAMOS
// Route::get('/modPacientes', [adminController::class,'muestraUsuarios'])->name('muestraUsuarios');
// Route::view('/verPacientes','pacientes.verPacientes')->name('verPacientes');


//*****RUTAS PACIENTES****

//VER TODOS LOS PACIENTES
// Route::get('/pacientes', [PacienteController::class,'index']);

//NOS LLEVA A LA VISTA CREAR PACIENTE
// Route::get('/creaPacientes', [PacienteController::class,'create'])->name("create");

//RUTA QUE GUARDA A UN PACIENTE
// Route::post('/guardar_paciente',[PacienteController::class,'store'])->name('store');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//***** FIN RUTAS PACIENTE *****//



//*****RUTAS USUARIOS *****//

Route::resource('users', UserController::class);

//*****RUTAS PACIENTES *****//

 Route::resource('pacientes', PacienteController::class);

//*****RUTAS MEDICOS *****//

Route::resource('medicos', MedicoController::class);

//*****RUTAS CREAR CITAS *****//

Route::resource('cita', PedirCitaController::class);

// Route::resource('crea_usuario', UserController::class);
// Route::post('/guardar_usuario',[UserController::class,'store'])->name('store');

//BORRAR USUARIO
// Route::delete('/borrar_usuario{dni}',[UserController::class,'destroy'])->name('borraUsuario');
// Route::show('/ver_usuario{dni}',[UserController::class,'show'])->name('verUsuario');

//RUTA VISTA CREA USUARIO


//RUTAS LOGIN

Route::view('/login', 'auth.login')->name('logear');
Route::post('/login-usuario', [AuthController::class, 'login'])->name('login');
Route::view('/registrar', 'registrar');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//GRUPO RUTAS ADMIN

Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin',[AuthController::class,'admin'])->name('admin');
    Route::post('/logout',[AuthController::class,'logout'])->name('admin');

});

//GRUPO RUTAS USER

Route::group(['middleware','paciente'],function(){

    Route::get('/paciente', [AuthController::class, 'paciente'])->name('paciente');
    //Route::get('/pacienteOtraFuncionalidad', [AuthController::class, 'pacienteOtraFuncionalidad'])->name('pacienteOtraFuncionalidad');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});