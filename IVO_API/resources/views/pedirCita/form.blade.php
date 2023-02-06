<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

         <script>
             $(function() {

                     let val1= $('#id_cita').val();
                            $('#id_cita').val(val1);
                         

                            $('#id_cita').on('keyup', function(){
                           let val =  $(this).val();
                            console.log(val);
                            $('#id_cita').val(val);
                 });
             });
         </script>

         <div class="box box-info padding-1">
             <div class="box-body">
                
             
                 <div class="form-group">
                     {{ Form::label('descripcion') }}
                     {{ Form::text('descripcion', $cita->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'descripcion']) }}
                     {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                 </div>
            
                 <div class="form-group">
                     {{ Form::label('fecha_creacion') }}
                     {{ Form::date('fecha_creacion', $citas->fecha_creacion, ['class' => 'form-control' . ($errors->has('fecha_creacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
                     {!! $errors->first('fecha_creacion', '<div class="invalid-feedback">:message</div>') !!}
                 </div>
                 <div class="form-group">
                     {{ Form::label('Especialidad') }}
                     <br>
                     {{-- {{ Form::text('especialidad', $radiologo->especialidad, ['class' => 'form-control' . ($errors->has('especialidad') ? ' is-invalid' : ''), 'placeholder' => 'especialidad']) }} --}}
                     {!! Form::select('especialidad', array('resonancia'=>'resonancia','tamografia'=>'tamografia','mri'=>'mri','mamografia'=>'mamografia')) !!}
                     {{-- {!! Form::checkbox('especialidad', 'tamografia', false, $radiologo->especialidad) !!} --}}

                     {{-- {{ Form::select('size', array('tamografia' => 'tamografia', 'resonancia' => 'resonancia','mri'=>'mri','mamografia'=>'mamografia'), 'S') }} --}}
                     {!! $errors->first('sexo', '<div class="invalid-feedback">:message</div>') !!}
                 </div>


                 <div class="form-group">
                     {{ Form::label('dni_paciente') }}
                     {{ Form::text('dni_paciente', $cita->dni_paciente, ['class' => 'form-control' . ($errors->has('dni_paciente') ? ' is-invalid' : ''), 'placeholder' => 'dni_paciente']) }}
                     {!! $errors->first('dni_paciente', '<div class="invalid-feedback">:message</div>') !!}
                 </div>
                 <div class="form-group">
                     {{ Form::label('dni_medico') }}
                     {{ Form::text('dni_medico', $cita->dni_medico, ['class' => 'form-control' . ($errors->has('dni_medico') ? ' is-invalid' : ''), 'placeholder' => 'dni_medico']) }}
                     {!! $errors->first('dni_medico', '<div class="invalid-feedback">:message</div>') !!}
                 </div>
        
             </div>
         </div>
     
         <div class="box-footer mt20">
             <button type="submit" class="btn btn-primary">Submit</button>
         </div>

         <script>
             @if(session('success'))
             swal("Buen Trabajo!", "{{ session('success') }}", "success");
             @endif
         </script>