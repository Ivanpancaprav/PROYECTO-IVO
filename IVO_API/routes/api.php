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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/pacientes',[ApiController::class,'mostrarPacientes']);

Route::get('/medicos',[ApiController::class,'mostrarMedicos']);

Route::get('/perfil/{dni}',[ApiController::class,'mostrarPerfil']);

Route::get('/citas', [ApiController::class,'mostrarCitas']); 

Route::get('/citasprevias', [ApiController::class,'mostrarCitasPrevias']); 

Route::get('/historiasclinicas', [ApiController::class,'mostrarHistoriasClinicas']); 

Route::get('/medicamento', [ApiController::class,'mostrarMedicamentos']); 

Route::get('/user/{dni}', [ApiController::class,'getUser']); 

Route::get('/citas', [ApiController::class,'mostrarCitas']);

Route::get('/informes', [ApiController::class,'mostrarInformes']);

//RUTAS LOGGIN
Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class,'register']);

Route::group(['middleware' => 'auth:api'], function () {
        Route::get('details', [UserController::class,'details']);
        Route::get('logout', [UserController::class,'logout']);
});
