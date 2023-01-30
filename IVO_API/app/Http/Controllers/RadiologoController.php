<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Radiologo;

class RadiologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

/**Mostrar los datos */

    public function index()
    {
        $radiologos = Radiologo::paginate(); //Asocia la base de datos a una variable

        return view('radiologo.index', compact('radiologos'))  //esta llamando a la variable para mostrar los datos 
            ->with('i', (request()->input('page', 1) - 1) * $radiologos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $radiologo = new Radiologo();
        $user = new User();
        return view('radiologo.create', compact('radiologo','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

/**LA MEJOR FORMA DE INSERTAR DATOS ya que se hace la comprobación de los campos obligatorios para que no hagan inyeccion y luego inserta. */

    public function store(Request $request)
    {
        $user = User::create($request->all());
        request()->validate(User::$rules);
        $radiologo = Radiologo::create($request->all());
        request()->validate(Radiologo::$rules);

        
        // dump($user);
        return redirect()->route('radiologo.index')
            ->with('success', 'radiologo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($dni){
    
        $radiologo =(object) Radiologo::whereDni_radiologo($dni)->get()->toArray()[0];
        $user =(object) User::whereDni($dni)->get()->toArray()[0];
        return view('radiologo.show', compact('radiologo', 'user'));
        
       
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
        $radiologo =(object) Radiologo::whereDni_radiologo($dni)->get()->toArray()[0];
        return view('radiologo.edit', compact('radiologo','user'));
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
       // dd($request);
        $validacion = $request->validate([
            'dni' => 'required',
            'nombre' =>'required',
            'apellido1' =>'required',
            'apellido2' =>'required',
            'direccion' =>'required',
            'email' =>'required',
            'sexo' =>'required',
            'password' =>'required',
            'role' =>'required',
            'fecha_nacimiento' =>'required',
        ]);
       // dump($validacion);
        $validacion2 = $request->validate([
            'especialidad' =>'required',
        ]);

       // dd($validacion2);
       
      //  dd($request);
        
        User::whereDni($request['dni_antiguo'])->update($validacion);
     
        Radiologo::whereDni_radiologo($request['dni'])->update($validacion2);
        
        return redirect()->route('radiologo.index')->with('success', 'Radiologo updated successfully');
    
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

/**Controlador para borrar */

    public function destroy($dni)
    {
        $radiologo = Radiologo::where('dni_radiologo',$dni)->delete();

        return redirect()->route('radiologo.index')
            ->with('success', 'radiologo deleted successfully');
    }
}

