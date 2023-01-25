<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('dni_paciente') }}
            {{ Form::text('dni_paciente', $paciente->dni_paciente, ['class' => 'form-control' . ($errors->has('dni_paciente') ? ' is-invalid' : ''), 'placeholder' => 'Dni Paciente']) }}
            {!! $errors->first('dni_paciente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_seguridad_social') }}
            {{ Form::text('n_seguridad_social', $paciente->n_seguridad_social, ['class' => 'form-control' . ($errors->has('n_seguridad_social') ? ' is-invalid' : ''), 'placeholder' => 'N Seguridad Social']) }}
            {!! $errors->first('n_seguridad_social', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_historial_clinico') }}
            {{ Form::text('n_historial_clinico', $paciente->n_historial_clinico, ['class' => 'form-control' . ($errors->has('n_historial_clinico') ? ' is-invalid' : ''), 'placeholder' => 'N Historial Clinico']) }}
            {!! $errors->first('n_historial_clinico', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>