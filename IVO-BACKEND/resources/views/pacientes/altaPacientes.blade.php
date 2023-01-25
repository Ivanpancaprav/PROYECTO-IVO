
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <br />
@endif



<style>
    fieldset{
       display:flex;
       width: 20%;
   
    }
   </style>


<fieldset>
    <legend>Alta usuarios</legend>

<form method="post" action="{{ route('guardarPaciente') }}">
    
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}" />
    <!--ponemos old porque en el caso que carguemos el formulario y diera error habría que volver a introducir todos los campos, así recuerda o guarda los campos que están bien-->
    {!! $errors->first('nombre', '<small>:message</small><br>') !!}
    <!-- así especificamos los errores debajo-->
    <br>
    <label for="dni">DNI:</label>
    <input type="text" name="dni" value="{{ old('dni') }}" />
    {!! $errors->first('dni', '<small>:message</small><br>') !!}
    <br>
    <label for="apellido1">Primer apellido:</label>
    <input type="text" name="apellido1" value="{{ old('apellido1') }}" />
    {!! $errors->first('apellido1', '<small>:message</small><br>') !!}
    <br>
    <label for="apellido2">Segundo apellido:</label>
    <input type="text" name="apellido2" value="{{ old('apellido2') }}" />
    {!! $errors->first('apellido2', '<small>:message</small><br>') !!}

    <br>
    <label for="direccion">Direccion:</label>
    <input type="text" name="direccion" value="{{ old('direccion') }}" />
    {!! $errors->first('direccion', '<small>:message</small><br>') !!}

    <br>

    <label for="Email">Email:</label>
    <input type="text" name="email" value="{{ old('email') }}" />
    {!! $errors->first('email', '<small>:message</small><br>') !!}

    <br>

    <label for="sexo">Sexo:</label>
    <select name="sexo" id="sexo">
        <option value="masculino">Hombre</option>
        <option value="femenino">Mujer</option>
    </select>
    <br>
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
    <br>
    
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password">
    <br>

    <label for="num_ss">Nº Seguridad Social:</label>
    <input type="number" name="num_ss" id="num_ss" value="{{ old('num_ss') }}">
    {!! $errors->first('num_ss', '<small>:message</small><br>') !!}

    <br>
    
    <label for="n_historial_clinico">Nº Historial Clinico:</label>
    <input type="number" name="n_historial_clinico" id="n_historial_clinico" value="{{ old('n_historial_clinico') }}">
    {!! $errors->first('n_historial_clinico', '<small>:message</small><br>') !!}
    
    <br>
    
    <input type="hidden" name="role" value="paciente">

    <button type="submit">Crear</button>
</form>
</fieldset>

<a href="/modPacientes">Ver pacientes</a>
    
<script>
@if (session('success'))
swal("Buen Trabajo!", "{{ session('success') }}", "success");
@endif
</script>
