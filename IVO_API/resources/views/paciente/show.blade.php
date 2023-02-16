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
                    <img src="{{ url('/images/'.$user->foto) }}" style="height:150px; width:200px">
                        <div class="form-group">
                            <strong>Dni Paciente:</strong>
                            {{ $paciente->dni_paciente }}
                        </div>
                        <div class="form-group">
                            <strong>N Seguridad Social:</strong>
                            {{ $paciente->n_seguridad_social }}
                        </div>
                        <div class="form-group">
                            <strong>N Historial Clínico:</strong>
                            {{ $paciente->n_historial_clinico }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $user->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido1:</strong>
                            {{ $user->apellido1 }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido2:</strong>
                            {{ $user->apellido2 }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $user->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $user->foto }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $user->sexo }}
                        </div>
                        <div class="form-group">
                            <strong>Role:</strong>
                            {{ $user->role }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $user->fecha_nacimiento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
