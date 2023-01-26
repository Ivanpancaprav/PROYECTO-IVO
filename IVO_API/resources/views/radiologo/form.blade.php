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
            
            </div>
        </div>
        <div class="form-group">
            <input hidden="text" value="" name="especialidad" id="especialidad">                                        

            {{-- {{ Form::text('especialidad', ['class' => 'form-control' . ($errors->has('especialidad') ? ' is-invalid' : ''),'id' =>'especialidad','name'=>'dni_radiologo', 'placeholder' => 'Dni radiologo' , 'disabled']) }} --}}
           <div class="invalid-feedback">:message</div>
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
