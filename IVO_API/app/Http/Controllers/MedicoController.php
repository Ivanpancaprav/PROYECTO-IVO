<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $emdico = new Medico();
        return view('medico.create', compact('medico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Medico::$rules);

        $medico = medico::create($request->all());

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
       
        return view('medico.show', compact('medico'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        $medico =(object) medico::whereDni_medico($dni)->get()->toArray()[0];
        return view('medico.edit', compact('medico'));
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
            'dni_medico' => 'required',
            'n_seguridad_social' =>'required',
            'n_historial_clinico' =>'required',
        ]);

        medico::whereDni_medico($request->dni_medico)->update($validacion);
                return redirect()->route('medicos.index')
            ->with('success', 'User updated successfully');
    
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($dni)
    {
        $medico = medico::where('dni_medico',$dni)->delete();

        return redirect()->route('medicos.index')
            ->with('success', 'medico deleted successfully');
    }

    public function ver_medicos(){

        $medicos = medico::paginate();
        $usuarios = User::all();

        return view('medico.index', compact('medicos','usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $medicos->perPage());

    }
}
