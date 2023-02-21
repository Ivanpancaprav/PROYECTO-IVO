@extends('layouts.app')

@section('template_title')
    {{ $medicamento->name ?? 'Show medicamento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show medicamento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('medicamentos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <img src="{{ url('/images/'.$user->foto) }}" style="height:150px; width:200px">
                        <div class="form-group">
                            <strong>Dni medicamento:</strong>
                            {{ $medicamento->dni_medicamento }}
                        </div>
                        <div class="form-group">
                            <strong>N Colegiado:</strong>
                            {{ $medicamento->n_colegiado }}
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
