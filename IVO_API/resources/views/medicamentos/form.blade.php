<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
        <div class="box box-info padding-1">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('nombre', $medicamento->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),'placeholder' => 'nombre']) }}
                    {!! $errors->first('Nombre', '<div class="invalNombre-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('cantidad', $medicamento->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'cantidad']) }}
                    {!! $errors->first('cantidad', '<div class="invalNombre-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('fecha_creacion') }}
                    {{ Form::date('fecha_creacion', $medicamento->fecha_creacion, ['class' => 'form-control' . ($errors->has('fecha_creacion') ? ' is-invalid' : ''), 'placeholder' => 'fecha creacion']) }}
                    {!! $errors->first('fecha_creacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

<script>
    @if (session('success'))
    swal("Buen Trabajo!", "{{ session('success') }}", "success");
    @endif
</script>
