<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Cita;
use App\Models\HistoriasClinica;
use App\Models\Medico;
use App\Models\Medicamento;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function mostrarPerfil(Request $request)
    {

        $users = (object) User::whereDni($request->dni)->get()->toArray()[0];
        return $users;
    }

    public function mostrarPacientes()
    {

        $users = User::all();
        $pacientes = DB::select('SELECT * FROM users ,pacientes where pacientes.dni_paciente = users.dni');
        return $pacientes;
    }

    public function mostrarMedicos()
    {

        $medicos = DB::select('SELECT * FROM users ,medicos where medicos.dni_medico = users.dni');
        return $medicos;
    }
    public function mostrarCitas(Request $request)
    {


        switch ($request->role) {
            case 'medico':
            case 'radiologo':

                $citas = Medico::find($request->dni)->citas()->with('paciente.user')->where('fecha_fin', '>=', NOW())->get();

                break;

            case 'paciente':

                $citas = Paciente::find($request->dni)->citas()->with('medico.user')->where('fecha_fin', '>=', NOW())->get();

                break;
        }

        return $citas;
    }
    public function getMedico(Request $request)
    {
        $medico = Medico::find($request->dni);
        $user = $medico->user()->get()->pluck('nombre');
        dd($user);
    }

    public function mostrarCitasPrevias(Request $request)
    {

        switch ($request->role) {
            case 'medico':
            case 'radiologo':

                $citas = Medico::find($request->dni)->citas()->with('paciente.user')->where('fecha_fin', '<', NOW())->get();

                break;

            case 'paciente':

                $citas = Paciente::find($request->dni)->citas()->with('medico.user')->where('fecha_fin', '<', NOW())->get();

                break;
        }

        return $citas;
    }

    public function mostrarMedicamentos()
    {

        $medicamentos = DB::select('SELECT * FROM medicamentos');
        return $medicamentos;
    }

    public function mostrarHistoriasClinicas()
    {

        $historiasclinicas = DB::select('SELECT * FROM historias_clinicas, users');
        return $historiasclinicas;
    }

    public function borrarHistoriasClinicas(Request $request)
    {  
        $historiasclinicas = HistoriasClinica::destroy($request->n_historia);

        return response()->json([
            "message" => "La historia con id =" . $historiasclinicas . " ha sido borrado con éxito"
        ], 201);
    }

    public function mostrarInformes()
    {
        $informes = DB::select('SELECT * FROM informes');
        return $informes;
    }

    public function getInforme(Request $request)
    {

        $informes = DB::select('SELECT * FROM informes WHERE id_informe =' . $request->id_informe);
        return $informes;
    }

    public function creaCita(Request $request)
    {

        $medico = Medico::where('dni_medico', '=', $request->dni_medico)->firstOrFail();
        $paciente = Paciente::where('dni_paciente', '=', $request->dni_paciente)->firstOrFail();

        $cita = new Cita(['hora' => $request->hora, 'fecha_creacion' => $request->fecha_creacion, 'fecha_fin' => $request->fecha_fin, 'especialidad' => $request->especialidad, 'descripcion' => $request->descripcion]);

        $paciente->citas()->save($cita);
        $medico->citas()->save($cita);
    }

    public function borraCita(Request $request)
    {
        $cita = Cita::destroy($request->id_cita);

        return response()->json([
            "message" => "La cita con id =" . $cita . " ha sido borrado con éxito"
        ], 201);
    }

    public function verCita(Request $request){
        // $cita = Cita::find($request->id_cita);

        $cita = DB::select('SELECT * FROM citas where id_cita =' . $request->id_cita);

        // $cita = Cita::find($request->id_cita);
        $medico = Medico::findOrFail($cita[0]->dni_medico)->user()->get()[0]->nombre;
        // $user = $medico->user()->get();
        // $user[0]->nombre
        $cita['nombre_medico'] = $medico;
        return $cita;
    }

    public function citaUpdate(Request $request){

        $cita = Cita::findOrFail($request->id_cita);

        $cita->fecha_creacion = $request->fecha_creacion;
        $cita->fecha_fin = $request->fecha_fin;
        $cita->especialidad = $request->especialidad;
        $cita->dni_medico = $request->dni_medico;
        $cita->dni_paciente = $request->dni_paciente;
        $cita->descripcion = $request->descripcion;

        $cita->save();
    }

    public function historia_create(Request $request){

        $medico = Medico::where('dni_medico', '=', $request->dni_medico)->firstOrFail();
        $paciente = Paciente::where('dni_paciente', '=', $request->dni_paciente)->firstOrFail();
        $historia = new HistoriasClinica(['tratamiento' => $request->tratamiento, 'progreso' => $request->progreso, 'fecha_inicio' => $request->fecha_inicio]);

        //INSERTAMOS EL PACIENTE EN LA RELACION 1 A M
        $paciente->historiasClinicas()->save($historia);

        //INSERTAMOS EL MEDICO EN LA TABLA INTERMEDIA RELACION M : M
        // $historia->medico()->attach($medico);
        $medico->historiasClinicas()->attach($historia);
    }

    public function update_historia(Request $request){

        $historia = HistoriasClinica::findOrFail($request->id_historia);

        if($request->fecha_fin){

            $historia->fecha_fin = $request->fecha_fin;
        }

        if($request->progreso){

            $historia->progreso = $request->progreso;
        }

        if($request->tratamiento){

            $historia->tratamiento = $request->tratamiento;
        }

        $historia->save();
    }

    public function getHistoria(Request $request){

        $historia = HistoriasClinica::findOrFail($request->id_historia);

        return $historia;
    }

    public function borra_historia(Request $request){

        $historia = HistoriasClinica::destroy($request->id_historia);

        return response()->json([
            "message" => "La historia con id =" . $historia . " ha sido borrado con éxito"
        ], 201);
    }

    public function set_medicamendo_en_historia(Request $request){
        $medicamento = Medicamento::find($request->id_medicamento);
        $historia = HistoriasClinica::find($request->n_historia);

        $medicamento->historiaClinica()->attach($historia);

        
    }


    // public function getImage(Request $request, $filename)
    // {
    //     $image = Storage::get('images/' . $filename);
    //     $type = Storage::mimeType('images/' . $filename);

    //     $response = response($image, 200)->header("Content-Type", $type);

    //     return $response;
    // }


}
