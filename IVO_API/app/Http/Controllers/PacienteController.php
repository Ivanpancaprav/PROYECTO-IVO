<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class PacienteController
 * @package App\Http\Controllers
 */
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate();

        return view('paciente.index', compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $pacientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paciente = new Paciente();
        $user = new User();
        return view('paciente.create', compact('paciente','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pass_encrypt = password_hash($request->password,PASSWORD_DEFAULT);

        $validacion = $request->validate([
            'dni' => 'required',
            'nombre' =>'required',
            'apellido1' =>'required',
            'apellido2' =>'required',
            'direccion' =>'required',
            'email' =>'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sexo' =>'required',
            'password' =>'required',
            'role' =>'required',
            'fecha_nacimiento' =>'required',
        ]);
   
        $validacion2 = $request->validate([
            'dni_paciente' => 'required',
            'n_seguridad_social' =>'required',
            'n_historial_clinico' => 'required'
        ]);

   
        $validacion['foto']=date("d_m_Y_h_i_s")."_".$request->foto->getClientOriginalName();
        $validacion["password"] = $pass_encrypt;

        User::create($validacion);
        Paciente::create($validacion2);

        // Subir imagenes
        $image = date("d_m_Y_h_i_s")."_".$request->foto->getClientOriginalName();
        $request->file('foto')->storeAs('./images',$image);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($dni){

        $paciente =Paciente::where('dni_paciente', '=', $dni)->firstOrFail();
        $user =User::where('dni', '=', $dni)->firstOrFail();
        return view('paciente.show', compact('paciente','user'));
       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        $paciente =Paciente::where('dni_paciente', '=', $dni)->firstOrFail();
        $user =User::where('dni', '=', $dni)->firstOrFail();
        $imagen = User::find($dni)->foto;
        Storage::delete('images/'.$imagen);
        return view('paciente.edit', compact('paciente','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Paciente $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validacion = $request->validate([
            'dni' => 'required',
            'nombre' =>'required',
            'apellido1' =>'required',
            'apellido2' =>'required',
            'direccion' =>'required',
            'foto' =>'required',
            'email' =>'required',
            'sexo' =>'required',
            'password' =>'required',
            'role' =>'required',
            'fecha_nacimiento' =>'required',
        ]);
        $validacion2 = $request->validate([
            'n_seguridad_social' =>'required',
            'n_historial_clinico' =>'required',
        ]);

        $dni_antiguo = $request['dni_antiguo'];
        //COMPARAMOS SI LA CONTRASEÑA QUE NOS LLEGA ES IGUAL A LA CONTRASEÑA ENCRIPTADA, SI ES IGUAL NO LA CAMBIAMOS SI ES DIFERENTE LA ACTUALIZAMOS
        $user =(object) User::whereDni($request->dni_antiguo)->get()->toArray()[0];

        if($user->password != $validacion["password"]){
              $validacion["password"] = password_hash($request->password,PASSWORD_DEFAULT);
        }

        // Subir imagenes
        $validacion['foto']=date("d_m_Y_h_i_s")."_".$request->foto->getClientOriginalName();
        $image = date("d_m_Y_h_i_s")."_".$request->foto->getClientOriginalName();
        $request->file('foto')->storeAs('./images',$image);

        User::whereDni($dni_antiguo)->update($validacion);
        Paciente::whereDni_paciente($validacion['dni'])->update($validacion2);
        
        return redirect()->route('pacientes.index')->with('success', 'User updated successfully');
    




    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($dni)
    {
        $imagen = User::find($dni)->foto;
        Storage::delete('images/'.$imagen);
        $paciente = User::where('dni',$dni)->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente deleted successfully');
    }
}
