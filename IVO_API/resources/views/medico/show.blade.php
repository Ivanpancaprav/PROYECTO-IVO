@extends('layouts.app')

@section('template_title')
    {{ $paciente->name ?? 'Show Paciente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Paciente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dni Paciente:</strong>
                            {{ $paciente->dni_paciente }}
                        </div>
                        <div class="form-group">
                            <strong>N Seguridad Social:</strong>
                            {{ $paciente->n_seguridad_social }}
                        </div>
                        <div class="form-group">
                            <strong>N Historial Clinico:</strong>
                            {{ $paciente->n_historial_clinico }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
