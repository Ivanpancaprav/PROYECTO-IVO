<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::paginate();

        return view('medicamentos.index', compact('medicamentos'))
            ->with('i', (request()->input('page', 1) - 1) * $medicamentos->perPage());
    }

    public function create()
    {
        $medicamento = new medicamento();
        
        return view('medicamentos.create', compact('medicamento'));
    }

    public function store(Request $request)
    {
        $validacion = $request->validate([
		    'nombre' => 'required',
		    'cantidad' => 'required',
		    'fecha_creacion' => 'required',
        ]);
    
        Medicamento::create($validacion);

        return redirect()->route('medicamentos.index')
            ->with('success', 'medicamento created successfully.');
    }

    public function show($id)
    {
        $medicamento =(object) Medicamento::whereid_medicamento($id)->get()->toArray()[0];
       
        return view('medicamentos.show', compact('medicamento'));
    }

    public function edit($id)
    {
        $medicamento =(object) Medicamento::whereid_medicamento($id)->get()->toArray()[0];
        return view('medicamentos.edit', compact('medicamento'));
    }

    public function update(Request $request,$id)
    {
        $validacion = $request->validate([
            'nombre' =>'required',
            'cantidad' =>'required',
            'fecha_creacion' =>'required',
        ]);

        Medicamento::whereid_medicamento($id)->update($validacion);

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento updated successfully');
    }

    public function destroy($id)
    {
        $medicamento = Medicamento::where('id_medicamento',$id);

        $medicamento->delete();
        
        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento deleted successfully');
    }
}
