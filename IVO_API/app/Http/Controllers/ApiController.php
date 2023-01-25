<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    

public function mostrarPacientes(){

    $users = User::all();

    return $users;
}

}
