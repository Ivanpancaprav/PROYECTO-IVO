<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    

public function mostrarPacientes(){

    $users = User::all();
    $pacientes = DB::select('SELECT * FROM users ,pacientes where pacientes.dni_paciente = users.dni');
    return $pacientes;
}

}
