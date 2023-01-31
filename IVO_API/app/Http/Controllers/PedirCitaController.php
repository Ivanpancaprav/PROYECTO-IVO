<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicos;
use App\Models\Pacientes;
use App\Models\Cita;

class PedirCitaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**Mostrar los datos */

    public function index()
    {
        $citas = Cita::paginate(); //Asocia la base de datos a una variable

        return view('pedirCita.index', compact('citas'))  //esta llamando a la variable para mostrar los datos 
            ->with('i', (request()->input('page', 1) - 1) * $citas->perPage());
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
        
        // $cita = new Cita();

         return view('pedirCita.create');
     }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $cita = Cita::create($request->all());
        request()->validate(Cita::$rules);
        $medico = Medico::create($request->all());
        request()->validate(Medico::$rules);
        $paciente = Paciente::create($request->all());
        request()->validate(Paciente::$fillable);


        return redirect()->route('cita.index')
            ->with('success', 'cita created successfully.');
    }

      /** REVISAR
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_cita){
    
        $cita =(object) Cita::whereid_cita($id_cita)->get()->toArray()[0];
        return view('pedirCita.show', compact('cita'));
    }


      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Radiologo $radiologo
     * @return \Illuminate\Http\Response
     */

    /**En el controlador para almacenar datos ya Actualizados */

    public function update(Request $request)
    {
        $validacion = $request->validate([

            'id_cita' =>'required',
            'fecha_creacion' =>'required',
            'especialidad' =>'required',
            'descripcion' =>'required',
            'dni_paciente' =>'required',
            'dni_medico' =>'required',
 
        ]);

        Cita::whereid_cita($request['id_cita'])->update($validacion);
     
      
        
        return redirect()->route('pedirCita.index')->with('success', 'Cita updated successfully');
    
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id_cita)
    {
        $cita = Cita::where('id_cita',$id_cita)->delete();

        return redirect()->route('pedirCita.index')
            ->with('success', 'Cita deleted successfully');
    }
}
