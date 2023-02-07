@extends('layouts.app')

@section('template_title')
    Update Paciente
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12 d-flex justify-content-center">

                @includeif('partials.errors')

                <div class="card card-default col-6">
                    <div class="card-header">
                        <span class="card-title">Update Paciente</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pacientes.update', $paciente->dni_paciente) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            
                            @include('paciente.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
