@extends('layouts.app')

@section('template_title')
    Medico
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Médico') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('medicos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>ID</th>
                                        <th>Nombre medico</th>
										<th>Dni medico</th>
										<th>N_Colegiado</th>
                                        <th>Especialidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicos as $medico)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $medico->user->nombre }}</td>
											<td>{{ $medico->dni_medico }}</td>
											<td>{{ $medico->n_colegiado }}</td>
                                            <td>{{ $medico->especialidad }}</td>

                                            <td>
                                                <form action="{{ route('medicos.destroy',$medico->dni_medico) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('medicos.show',$medico->dni_medico) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('medicos.edit',$medico->dni_medico) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $medicos->links() !!}
            </div>
        </div>
    </div>
@endsection
