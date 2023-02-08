@extends('layouts.app')

@section('template_title')
    {{ $historiasClinica->name ?? 'Show Historias Clinica' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Historias Clinica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('historias-clinicas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>N Historia:</strong>
                            {{ $historiasClinica->n_historia }}
                        </div>
                        <div class="form-group">
                            <strong>Tratamiento:</strong>
                            {{ $historiasClinica->tratamiento }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $historiasClinica->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $historiasClinica->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Dni Paciente:</strong>
                            {{ $historiasClinica->dni_paciente }}
                        </div>
                        <div class="form-group">
                            <strong>Dni Medico:</strong>
                            {{ $historiasClinica->dni_medico }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
