<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Http\Request;

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
        $user = User::create($request->all());
        request()->validate(User::$rules);
        $paciente = Paciente::create($request->all());
        request()->validate(Paciente::$rules);

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
    
        $paciente =(object) Paciente::whereDni_paciente($dni)->get()->toArray()[0];
       
        return view('paciente.show', compact('paciente'));
       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        $user =(object) User::whereDni($dni)->get()->toArray()[0];
        $paciente =(object) Paciente::whereDni_paciente($dni)->get()->toArray()[0];
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
            'dni_paciente' => 'required',
            'n_seguridad_social' =>'required',
            'n_historial_clinico' =>'required',
        ]);

        Paciente::whereDni_paciente($request->dni_paciente)->update($validacion);
                return redirect()->route('pacientes.index')
            ->with('success', 'User updated successfully');
    
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($dni)
    {
        $paciente = Paciente::where('dni_paciente',$dni)->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente deleted successfully');
    }
}
