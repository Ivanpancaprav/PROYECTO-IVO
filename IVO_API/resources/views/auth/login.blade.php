{{-- <form method="post" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="dni" class="form-control p_input">
    </div>
    <div class="form-group">
        <label>Password *</label>
        <input type="password" name="password" class="form-control p_input">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
    </div>

</form> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

body {
    background: url(/assets/img/fondo.jpg);
    width: 100%;
    height: 100vh;
    background-size: 100% 100%;
    opacity: 0.8;
}


.contenedor{
    width: 45%;
    height: 100vh;
    background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(60,199,252,1) 50%, rgba(0,212,255,1) 100%);
}

.logo {
    width: 200px;
    height: 200px;
    border-radius: 15px;
    background-size: 100% 100%;
    filter: brightness(0%);
}

.login {
    height: 47px;
    font-family: "Archivo Black";
    font-size: 40px;
    text-align: center;
    color: #000000;
}

.dni {
    color: #000000;
}

.contra {
    font-family: 'Inter';
    font-size: 20px;
    color: #000000;
}

a{
    width: 239px;
    height: 25px;
    font-family: 'Inter';
    font-size: 20px;
    color: #266352;
    text-decoration: none;

}

.acceder{
    width: 150px;
    height: 50px;
    background: #266352;
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    color: white;
}

.cuenta{
    height: 25px;
    font-family: 'Interger';
    font-size: 20px;
}

.verde{
    background-color: #266352;
    width: 30px;
    height: 30px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}


input:invalid {
    outline: 2px solid red;
}
</style>
<body>

    <head>
        <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
      <body>
          <div class="container-fluid d-flex flex-column">
              <div class="contenedor row d-flex flex-column align-self-end align-items-center">
                  <img class="logo" src="/assets/img/logo.png">
                  <div class="login">LOGIN</div>
                  <br>
                  <div class="row d-flex flex-column align-items-center">
                    <form method="post" action="{{route('login')}}">
                        
                        @csrf

                      <div class="form-group">
                        <label>DNI</label>
                        <div class="row-1 dni">
                            <input type="text" class="form-control" placeholder="Introduce tu DNI" name="dni" maxlength="9" pattern="[0-9]{8}[A-Za-z]{1}">
                        </div>
                      </div><br>
                      <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Introduce tu contraseña">
                      </div><br>
                      <div class="form-check d-flex justify-content-between">
                        <div>
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label">Recordar</label>
                        </div>
                        <a class="text-end" href="">Olvidaste la contraseña?</a>
                    </div>
                    <div class="row-2 d-flex justify-content-end my-3">
                      <button type="submit" class="acceder">Acceder ➔</button>
                    </div>
                    </form>
              </div>
              <div class="d-flex flex-row mb-2 justify-content-end">
                <div class="cuenta">No tienes una cuenta?</div><a href="#">Registrate</a>
              </div>
              </div><br>  
          </div>
      </body>
    
</body>
</html>