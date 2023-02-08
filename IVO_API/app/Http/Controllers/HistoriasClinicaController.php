<?php

namespace App\Http\Controllers;

use App\Models\HistoriasClinica;
use Illuminate\Http\Request;

/**
 * Class HistoriasClinicaController
 * @package App\Http\Controllers
 */
class HistoriasClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiasClinicas = HistoriasClinica::paginate();

        return view('historias-clinica.index', compact('historiasClinicas'))
            ->with('i', (request()->input('page', 1) - 1) * $historiasClinicas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $historiasClinica = new HistoriasClinica();
        return view('historias-clinica.create', compact('historiasClinica'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(HistoriasClinica::$rules);

        $historiasClinica = HistoriasClinica::create($request->all());

        return redirect()->route('historias-clinicas.index')
            ->with('success', 'HistoriasClinica created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historiasClinica = HistoriasClinica::find($id);

        return view('historias-clinica.show', compact('historiasClinica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historiasClinica = HistoriasClinica::find($id);

        return view('historias-clinica.edit', compact('historiasClinica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  HistoriasClinica $historiasClinica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoriasClinica $historiasClinica)
    {
        request()->validate(HistoriasClinica::$rules);

        $historiasClinica->update($request->all());

        return redirect()->route('historias-clinicas.index')
            ->with('success', 'HistoriasClinica updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $historiasClinica = HistoriasClinica::find($id)->delete();

        return redirect()->route('historias-clinicas.index')
            ->with('success', 'HistoriasClinica deleted successfully');
    }
}
