@extends('layouts.app')

@section('template_title')
    {{ $medico->name ?? 'Show medico' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show medico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medicos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dni medico:</strong>
                            {{ $medico->dni_medico }}
                        </div>
                        <div class="form-group">
                            <strong>N Seguridad Social:</strong>
                            {{ $medico->n_seguridad_social }}
                        </div>
                        <div class="form-group">
                            <strong>N Historial Clinico:</strong>
                            {{ $medico->n_historial_clinico }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
