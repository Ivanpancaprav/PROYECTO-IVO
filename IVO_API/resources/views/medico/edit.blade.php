@extends('layouts.app')

@section('template_title')
    Update Medico
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12 d-flex justify-content-center">

                @includeif('partials.errors')

                <div class="card card-default col-6">
                    <div class="card-header">
                        <span class="card-title">Update Medico</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('medicos.update', $medico->dni_medico) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('medico.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
