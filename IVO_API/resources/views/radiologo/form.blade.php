         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                    <script>
                        $(function (){   

                            $('#dni').on('keyup', function(){
                           let val =  $(this).val();
                            console.log(val);
                            $('#dni_radiologo').val(val);
                        });
                    });
                       
                    </script>
   
        <div class="box box-info padding-1">
        <div class="box-body">
                <div class="form-group">
                    {{ Form::label('dni') }}
                    {{ Form::text('dni', $user->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'id'=>'dni','placeholder' => 'Dni']) }}
                    {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $user->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('apellido1') }}
                    {{ Form::text('apellido1', $user->apellido1, ['class' => 'form-control' . ($errors->has('apellido1') ? ' is-invalid' : ''), 'placeholder' => 'Apellido1']) }}
                    {!! $errors->first('apellido1', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('apellido2') }}
                    {{ Form::text('apellido2', $user->apellido2, ['class' => 'form-control' . ($errors->has('apellido2') ? ' is-invalid' : ''), 'placeholder' => 'Apellido2']) }}
                    {!! $errors->first('apellido2', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('direccion') }}
                    {{ Form::text('direccion', $user->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('email') }}
                    {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            
                <div class="form-group">
                    {{ Form::label('Sexo') }}
                    <br>
                    {{-- {{ Form::text('sexo', $user->sexo, ['class' => 'form-control' . ($errors->has('sexo') ? ' is-invalid' : ''), 'placeholder' => 'sexo']) }} --}}
                {!! Form::select('sexo', array('Masculino'=>'masculino','Femenino'=>'femenino')) !!}
                    {{-- {!! Form::checkbox('sexo', 'femenino', false, $user->sexo) !!} --}}
                    
                    {{-- {{ Form::select('size', array('Femenino' => 'femenino', 'Masculino' => 'masculino'), 'S') }}  --}}
                    {!! $errors->first('sexo', '<div class="invalid-feedback">:message</div>') !!}
                    
                </div>
        
                <div class="form-group">
                    {{ Form::label('password') }}
                    {{ Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'password']) }}
                {{-- {!! Form::select('Sexo', array('Masculino'=>'masculino','Femenino'=>'femenino'), $selected, [$options]) !!} --}}
                    {{-- {!! Form::checkbox('sexo', 'femenino', false, $user->sexo) !!} --}}
                    
                    {{-- {{ Form::select('size', array('Femenino' => 'femenino', 'Masculino' => 'masculino'), 'S') }}  --}}
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
                <div class="form-group">
                    {{ Form::label('fecha_nacimiento') }}
                    {{ Form::date('fecha_nacimiento', $user->fecha_nacimiento, ['class' => 'form-control' . ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
                    {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            
                <div class="form-group">
                    <input type="hidden" value="radiologo" name="especialidad">                                        
                    {!! $errors->first('especialidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            
            </div>
        </div>
        <div class="form-group">
            <input hidden="text" value="" name="dni_radiologo" id="dni_radiologo">                                        
            {{-- {{ Form::text('dni_radiologo', $radiologo->dni_radiologo, ['class' => 'form-control' . ($errors->has('dni_radiologo') ? ' is-invalid' : ''),'id' =>'dni_radiologo','name'=>'dni_radiologo', 'placeholder' => 'Dni radiologo' , 'disabled']) }} --}}
            {!! $errors->first('dni_radiologo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>


     
<script>
    @if (session('success'))
    swal("Buen Trabajo!", "{{ session('success') }}", "success");
    @endif
    </script>