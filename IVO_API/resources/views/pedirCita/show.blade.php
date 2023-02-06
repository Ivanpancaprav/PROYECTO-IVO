@extends('layouts.app')

@section('template_title')
    {{ $cita->name ?? 'Show cita' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show cita</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedirCita.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <scita->id_cita }}
                        </div>
                        <div class="form-group">
                            <strong>fecha_creacion:</strong>
                            {{ $cita->fecha_creacion }}
                        </div>
                        <div class="form-group">
                            <strong>especialidad:</strong>
                            {{ $cita->especialidad }}
                        </div>
                        <div class="form-group">
                            <strong>descripción:</strong>
                            {{ $cita->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>dni_pacdni_medico:</strong>
                            {{ $cita->dni_pacdni_medico }}
                        </div>
                        <div class="form-group">
                            <strong>dni_medico:</strong>
                            {{ $cita->dni_medico }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
