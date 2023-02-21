@extends('layouts.app')

@section('template_title')
    medicamento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Medicamento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('medicamentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Nombre Medicamento</th>
										<th>Cantidad</th>
										<th>Fecha_creación</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicamentos as $medicamento)
                                        <tr>
                                            <td>{{ $medicamento->id_medicamento }}</td>
                                            <td>{{ $medicamento->nombre }}</td>
											<td>{{ $medicamento->cantidad }}</td>
											<td>{{ $medicamento->fecha_creacion }}</td>
                                            <td>
                                                <form action="{{ route('medicamentos.destroy',$medicamento->id_medicamento) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('medicamentos.show',$medicamento->id_medicamento) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('medicamentos.edit',$medicamento->id_medicamento) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $medicamentos->links() !!}
            </div>
        </div>
    </div>
@endsection
