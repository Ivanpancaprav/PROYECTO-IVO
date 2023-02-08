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
                            <a class="btn btn-primary" href="{{ route('citas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                    
                        <div class="form-group">
                            <strong>fecha_creacion:</strong>
                            {{ $citas->fecha_creacion }}
                        </div>
                        <div class="form-group">
                            <strong>especialidad:</strong>
                            {{ $citas->especialidad }}
                        </div>
                        <div class="form-group">
                            <strong>descripción:</strong>
                            {{ $citas->descripcion }}
                        </div>
                     
                        <div class="form-group">
                            <strong>dni_medico:</strong>
                            {{ $citas->dni_medico }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
