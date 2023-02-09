<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Http\Medicos;
use Illuminate\Http\Citas;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function mostrarPacientes(){

    $users = User::all();
    $pacientes = DB::select('SELECT * FROM users ,pacientes where pacientes.dni_paciente = users.dni');
    return $pacientes;
    }

    public function mostrarPerfil(Request $request){

        $users =(object) User::whereDni($request->dni)->get()->toArray()[0];
        return $users;

    }
    public function mostrarMedicos(){

        $medicos = DB::select('SELECT * FROM users ,medicos where medicos.dni_medico = users.dni');
        return $medicos;


    }
    public function mostrarCitas(){

        $citas= DB::select('SELECT * FROM citas ');
        return $citas;

    }

    // public function getUser(Request $request){

    //     $role = DB::select('SELECT role FROM users where users.dni = '.$request->dni);
    //     $user=null;

    //     switch($role[0]->role){

    //         case 'paciente':
                
    //             $user = DB::select('SELECT * FROM users ,pacientes where pacientes.dni_paciente = users.dni AND users.dni = '.$request->dni);

    //             break;

    //         case 'medico':

    //             $user = DB::select('SELECT * FROM users ,medicos where medicos.dni_medico = users.dni AND users.dni = '.$request->dni);
    
    //             break;

    //     }

    //     return $user;
    // }

    // // public function loginU(){

    // //     if(Auth::attempt(['dni' => $dni, 'password' => $password])){

    // //     }

    // // }

}
 