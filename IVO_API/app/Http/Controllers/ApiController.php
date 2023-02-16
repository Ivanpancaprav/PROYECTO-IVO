<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\User;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Http\Medicos;
use Illuminate\Http\Citas;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function mostrarPerfil(Request $request){

        $users =(object) User::whereDni($request->dni)->get()->toArray()[0];
        return $users;

    }

    public function mostrarPacientes(){

    $users = User::all();
    $pacientes = DB::select('SELECT * FROM users ,pacientes where pacientes.dni_paciente = users.dni');
    return $pacientes;
    }

    public function mostrarMedicos(){

        $medicos = DB::select('SELECT * FROM users ,medicos where medicos.dni_medico = users.dni');
        return $medicos;


    }
    public function mostrarCitas(){

        $citas= DB::select('SELECT * FROM citas, users where fecha_creacion >= NOW() AND citas.dni_medico = users.dni;');
        return $citas;

    }

    public function mostrarCitasPrevias(){
       
        $citasprevias= DB::select('SELECT * FROM citas, users where fecha_creacion < NOW() AND citas.dni_medico = users.dni;');
        return $citasprevias;

    }
    public function mostrarMedicamentos(){

        $medicamentos= DB::select('SELECT * FROM medicamentos');
        return $medicamentos;

    }

    public function mostrarHistoriasClinicas(){


        $historiasclinicas= DB::select('SELECT * FROM historias_clinicas, users');
        return $historiasclinicas;

    }

    public function mostrarInformes(){

        $informes= DB::select('SELECT * FROM informes');
        return $informes;

    }

<<<<<<< HEAD
    public function getInforme(Request $request){

        $informes= DB::select('SELECT * FROM informes WHERE id_informe ='.$request->id_informe);
        return $informes;

    }
    
=======
    public function getImage(Request $request, $filename)
    {
        $image = Storage::get('images/' . $filename);
        $type = Storage::mimeType('images/' . $filename);

        $response = response($image, 200)->header("Content-Type", $type);

        return $response;
    }

>>>>>>> 27db1ce19877f702324e10ab96d316ba6e5c2783

}
 