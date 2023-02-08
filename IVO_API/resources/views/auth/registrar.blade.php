<form method="post" action="{{ route('registro') }}">
    @csrf
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control p_input">
    </div>
    <div class="form-group">
        <label>dni</label>
        <input type="text" name="dni" class="form-control p_input">
    </div>
    <div class="form-group">
        <label>email</label>
        <input type="text" name="email" class="form-control p_input">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control p_input">
    </div>

    <input type="hidden" name="role" value="administrador">

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
    </div>

</form>
