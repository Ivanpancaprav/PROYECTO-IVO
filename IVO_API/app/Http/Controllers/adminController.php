<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Radiologo;
use App\Models\Medico;
use App\Models\User;


class adminController extends Controller
{
    //ESTA FUNCION SIRVE PARA TODO TIPO DE ALTAS DE USUARIOS
    public function altaUsuario($request){
  
    // TODO -> EN SEXO Y ROLE SON ENUMERADOS, A VER COMO PONERLO EN REQUIRED
     
        User::create($request);
            $creado = true;

        return $creado;
    
    }
    
    public function altaPaciente(Request $request){
   
    $request=request()->validate([
        'dni'=>'required|max:9',
        'nombre'=>'required|max:50',
        'apellido1'=>'required|max:50',
        'apellido2'=>'max:50',
        'direccion'=>'max:150',
        'email'=>'required|max:150',
        'email_verified_at',
        'sexo'=>'required',
        'role'=>'',
        'fecha_nacimiento'=>'required',
        'password'=>'required',
        'remember_token',
        'num_ss'=>'required',
        'n_historial_clinico'=>'required'
    ]);
       
    adminController::altaUsuario($request);
        
        $dni_ususario =$request['dni'];
        $num_ss =$request['num_ss'];
     
        $num_historial = $_POST['n_historial_clinico'];
        
        // Creamos el nuevo paciente a raiz del dni del usuario previamente creado
        $paciente = new Paciente(['dni_paciente'=>$dni_ususario,'n_seguridad_social'=>$num_ss,'n_historial_clinico'=>$num_historial]);
        Paciente::create($paciente->toArray());
               
        return back()->with('success',"Paciente almacenado correctamente");
    }

    public function bajaPaciente($dni){
        $dato = User::findOrFail($dni);
        $dato->delete();
        return redirect()->route('muestraUsuarios');
    }

    public function muestraUsuarios(){
        $users = User::all();
        return view("pacientes.verPacientes",['users' => $users]);
    }

    public function actualizaPaciente($dni){
        
        $paciente = Paciente::findOrFail($dni);  

        $dniPaciente = $paciente->dni;
        dd($dni);

        return view('editar', compact('dato'));
    }


}
