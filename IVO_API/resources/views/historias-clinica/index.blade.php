@extends('layouts.app')

@section('template_title')
    Historias Clinica
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Historias Clinica') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('historias-clinicas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>N Historia</th>
										<th>Tratamiento</th>
										<th>Fecha Fin</th>
										<th>Fecha Inicio</th>
										<th>Dni Paciente</th>
										<th>Dni Medico</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historiasClinicas as $historiasClinica)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $historiasClinica->n_historia }}</td>
											<td>{{ $historiasClinica->tratamiento }}</td>
											<td>{{ $historiasClinica->fecha_fin }}</td>
											<td>{{ $historiasClinica->fecha_inicio }}</td>
											<td>{{ $historiasClinica->dni_paciente }}</td>
											<td>{{ $historiasClinica->dni_medico }}</td>

                                            <td>
                                                <form action="{{ route('historias-clinicas.destroy',$historiasClinica->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('historias-clinicas.show',$historiasClinica->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('historias-clinicas.edit',$historiasClinica->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $historiasClinicas->links() !!}
            </div>
        </div>
    </div>
@endsection
