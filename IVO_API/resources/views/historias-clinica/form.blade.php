<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('n_historia') }}
            {{ Form::text('n_historia', $historiasClinica->n_historia, ['class' => 'form-control' . ($errors->has('n_historia') ? ' is-invalid' : ''), 'placeholder' => 'N Historia']) }}
            {!! $errors->first('n_historia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tratamiento') }}
            {{ Form::text('tratamiento', $historiasClinica->tratamiento, ['class' => 'form-control' . ($errors->has('tratamiento') ? ' is-invalid' : ''), 'placeholder' => 'Tratamiento']) }}
            {!! $errors->first('tratamiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_fin') }}
            {{ Form::text('fecha_fin', $historiasClinica->fecha_fin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::text('fecha_inicio', $historiasClinica->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dni_paciente') }}
            {{ Form::text('dni_paciente', $historiasClinica->dni_paciente, ['class' => 'form-control' . ($errors->has('dni_paciente') ? ' is-invalid' : ''), 'placeholder' => 'Dni Paciente']) }}
            {!! $errors->first('dni_paciente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dni_medico') }}
            {{ Form::text('dni_medico', $historiasClinica->dni_medico, ['class' => 'form-control' . ($errors->has('dni_medico') ? ' is-invalid' : ''), 'placeholder' => 'Dni Medico']) }}
            {!! $errors->first('dni_medico', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>