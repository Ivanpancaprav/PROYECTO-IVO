@extends('layouts.app')

@section('template_title')
    Create medicamento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row" >
            <div class="col-md-12 d-flex justify-content-center">

                @includeif('partials.errors')

                <div class="card card-default col-6">
                    <div class="card-header">
                        <span class="card-title">Create medicamento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('medicamentos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('medicamentos.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection