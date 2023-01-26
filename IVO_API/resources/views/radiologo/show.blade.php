@extends('layouts.app')

@section('template_title')
    {{ $radiologo->name ?? 'Show Radiologo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Radiologo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dni Radiologo:</strong>
                            {{ $radiologo->dni_radiologo }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
