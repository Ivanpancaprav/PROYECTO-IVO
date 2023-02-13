<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medico;

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
        request()->validate(User::$rules);
        $request['foto']="pepe.jpg";
        $user = User::create($request->all());
        request()->validate(Medico::$rules);
        $medico = Medico::create($request->all());

        // Subir imagenes
        dd($image = "foto".time().'.'.$request->file('foto'));
        $request->ficheroSubir->storeAs('public/images',$image);
        
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
    
        $medico =(object) medico::whereDni_medico($dni)->get()->toArray()[0];
        $user =(object) User::whereDni($dni)->get()->toArray()[0];
       
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
        $medico =(object) Medico::whereDni_medico($dni)->get()->toArray()[0];
        $user =(object) User::whereDni($dni)->get()->toArray()[0];
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
            'apellido2' =>'required',
            'direccion' =>'required',
            'foto' => 'required',
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

        User::whereDni($dni_antiguo)->update($validacion);
        Medico::whereDni_medico($validacion['dni'])->update($validacion2);
        
        $image = $request->file('foto')->resize(300, 200);
        $name = time().'.'.$image->extension();
        
        return redirect()->route('medicos.index')->with('success', 'Medico updated successfully');
    
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($dni)
    {
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
