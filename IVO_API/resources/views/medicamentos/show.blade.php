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
                        <div class="form-group">
                            <strong>ID medicamento:</strong>
                            {{ $medicamento->id_medicamento }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $medicamento->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $medicamento->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha_creacion:</strong>
                            {{ $medicamento->fecha_creacion }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
