@extends('layouts.app')

@section('template_title')
    Update medicamento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12 d-flex justify-content-center">

                @includeif('partials.errors')

                <div class="card card-default col-6">
                    <div class="card-header">
                        <span class="card-title">Update medicamento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('medicamentos.update', $medicamento->dni_medicamento) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('medicamento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
