<?php

namespace App\Http\Controllers;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    public function index()
    {
        $medicamento = Medicamento::paginate();

        return view('medicamentos.index', compact('medicamento'))
            ->with('i', (request()->input('page', 1) - 1) * $medicamento->perPage());
    }

    public function create()
    {
        $medicamento = new medicamento();
        
        return view('medicamentos.create', compact('medicamento'));
    }

    public function store(Request $request)
    {
        request()->validate(Medicamento::$rules);
        
        $new_medicamento = request()->all();
        
        Medicamento::create($new_medicamento);

        return redirect()->route('medicamentos.index')
            ->with('success', 'medicamento created successfully.');
    }

    public function show($id)
    {
        $medicamento =(object) Medicamento::whereDni($id)->get()->toArray()[0];
       
        return view('medicamentos.show', compact('medicamento'));
    }

    public function edit($id)
    {
        $medicamento =(object) Medicamento::whereDni($id)->get()->toArray()[0];
        return view('medicamentos.edit', compact('medicamento'));
    }

    public function update(Request $request)
    {
        $validacion = $request->validate([
            'nombre' =>'required',
            'dosis' =>'required',
            'fecha_creacion' =>'required',
        ]);
        
        $medicamento =(object) Medicamento::whereDni($id)->get()->toArray()[0];

        Medicamento::whereDni($id)->update($validacion);

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento updated successfully');
    }

    public function destroy($id)
    {
        $medicamento = Medicamento::where('id',$id);

        $medicamento->delete();
        
        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento deleted successfully');
    }
}
