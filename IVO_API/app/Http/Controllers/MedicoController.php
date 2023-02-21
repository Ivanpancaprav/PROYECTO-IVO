<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medico;
use Illuminate\Support\Facades\Storage;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::paginate();

        return view('medico.index', compact('medicos'))
            ->with('i', (request()->input('page', 1) - 1) * $medicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medico = new Medico();
        $user = new User();
        return view('medico.create', compact('medico','user'));
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
            'nombre' => 'required',
            'apellido1' => 'required',
            'direccion' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required',
            'password' =>'required','min:8',
            'sexo' => 'required',
            'role' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        $validacion2 = $request->validate([
            'dni_medico' => 'required',
            'especialidad'=>'required',
            'n_colegiado' =>'required'

        ]);

        $validacion['foto']=date("d_m_Y_h_i_s")."_".$request->foto->getClientOriginalName();
        $validacion["password"] = $pass_encrypt;

        User::create($validacion);
        Medico::create($validacion2);

        // Subir imagenes
        $image = date("d_m_Y_h_i_s")."_".$request->foto->getClientOriginalName();
        $request->file('foto')->storeAs('./images',$image);
        
        return redirect()->route('medicos.index')
            ->with('success', 'medico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($dni){

        $medico =Medico::where('dni_medico', '=', $dni)->firstOrFail();
        $user =User::where('dni', '=', $dni)->firstOrFail();
        return view('medico.show', compact('medico','user'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        $medico =Medico::where('dni_medico', '=', $dni)->firstOrFail();
        $user =User::where('dni', '=', $dni)->firstOrFail();
        $imagen = User::find($dni)->foto;
        Storage::delete('images/'.$imagen);
        return view('medico.edit', compact('medico','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  medico $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validacion = $request->validate([
            'dni' => 'required | max:9 |  min:9',
            'nombre' =>'required',
            'apellido1' =>'required',
            'direccion' =>'required',
            'foto' =>'required',
            'email' =>'required | email',
            'sexo' =>'required',
            'password' =>'required | min:8',
            'role' =>'required',
            'fecha_nacimiento' =>'required',
        ]);

        $validacion2 = $request->validate([
            'n_colegiado' =>'required',
            'especialidad' =>'required'
        ]);

        $dni_antiguo = $request['dni_antiguo'];
        
        $validacion['foto']=date("d_m_Y_h_i_s")."_".$request->foto->getClientOriginalName();

        User::whereDni($dni_antiguo)->update($validacion);
        Medico::whereDni_medico($validacion['dni'])->update($validacion2);
        
        // Subir imagenes
        $image = date("d_m_Y_h_i_s")."_".$request->foto->getClientOriginalName();
        $request->file('foto')->storeAs('./images',$image);
        
        return redirect()->route('medicos.index')->with('success', 'Medico updated successfully');
    
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
        $medico = User::where('dni',$dni)->delete();

        return redirect()->route('medicos.index')
            ->with('success', 'medico deleted successfully');
    }

    public function ver_medicos(){

        $medicos = Medico::paginate();
        $usuarios = User::all();

        return view('medico.index', compact('medicos','usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $medicos->perPage());

    }

    public function isValidNif($nif)
   {
      $nifRegEx = '/^[0-9]{8}[A-Z]$/i';
      $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

      if (preg_match($nifRegEx, $nif)) {
         return ($letras[(substr($nif, 0, 8) % 23)] == $nif[8]);
      }

      return false;
   }
}
