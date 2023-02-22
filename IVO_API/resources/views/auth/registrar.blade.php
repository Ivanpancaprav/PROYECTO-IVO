<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<style>
body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, 
pre, form, fieldset, input, textarea, p, blockquote, th, td { 
  padding:0;
  margin:0;}

fieldset, img {border:0}

ol, ul, li {list-style:none}

:focus {outline:none}

body,
input,
textarea,
select {
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  color: #4c4c4c;
}

body{
  width: 100%;
  height: 100%;
  background-color: rgb(212, 242, 248);
}

p {
  font-size: 12px;
  width: 150px;
  display: inline-block;
  margin-left: 18px;
}
h1 {
  font-size: 32px;
  font-weight: 300;
  color: #4c4c4c;
  text-align: center;
  padding-top: 10px;
  margin-bottom: 10px;
}

html{
  background-color: #ffffff;
}

.testbox {
  position: absolute;
  top: 10%;
  left: 38%;
  width: 350px; 
  height: 450px; 
  -webkit-border-radius: 8px/7px; 
  -moz-border-radius: 8px/7px; 
  border-radius: 8px/7px; 
  background-color: #ebebeb; 
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
  border: solid 1px #cbc9c9;
}

input[type=radio] {
  visibility: hidden;
}

form{
  margin: 0 30px;
}

label{
  display: inline-block;
  width: 80px;
}

input[type=radio]:checked + label:after {
	opacity: 1;
}

hr{
  color: #a9a9a9;
  opacity: 0.3;
}

input[type=text],input[type=password]{
  width: 200px; 
  height: 39px; 
  -webkit-border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  -moz-border-radius: 0px 4px 4px 0px/0px 0px 4px 4px; 
  border-radius: 0px 4px 4px 0px/5px 5px 4px 4px; 
  background-color: #fff; 
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  border: solid 1px #cbc9c9;
  margin-left: -5px;
  margin-top: 13px; 
  padding-left: 10px;
}

#icon {
  display: inline-block;
  width: 30px;
  background-color: #3a57af;
  padding: 11px 0px 11px 15px;
  margin-left: 15px;
  -webkit-border-radius: 4px 0px 0px 4px; 
  -moz-border-radius: 4px 0px 0px 4px; 
  border-radius: 4px 0px 0px 4px;
  color: white;
  -webkit-box-shadow: 1px 2px 5px rgba(0,0,0,.09);
  -moz-box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
  border: solid 0px #cbc9c9;
}

.gender {
  margin-left: 30px;
  margin-bottom: 30px;
}

.accounttype{
  margin-left: 8px;
  margin-top: 20px;
}

button {
    background-color: #3a57af;
    border-radius: 4px;
    border: none;
    color: white;
    padding: 5px 5px;
    text-align: center;
    font-size: 16px;
    margin-top: 10px;
    margin-left: 35%;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    border: 1px solid black;
}

button:hover {
    background-color: white;
    color: black;
}

</style>
<div class="testbox">
  <h1>Registro para Administradores</h1>
  <hr>
  <form method="post" action="{{ route('registro') }}">
@csrf
<div class="form-group">
    <label id="icon"><i class="icon-user"></i></label>
    <input type="text" name="nombre" class="form-control p_input" placeholder="Nombre" required/>
</div>     
<div class="form-group">
    <label id="icon"><i class="icon-credit-card"></i></label>
    <input type="text" name="dni" class="form-control p_input" placeholder="DNI" required/>
</div>
<div class="form-group">
    <label id="icon"><i class="icon-envelope"></i></label>
    <input type="text" name="email" class="form-control p_input" placeholder="Email" required/>
</div>
<div class="form-group">
    <label id="icon"><i class="icon-shield"></i></label>
    <input type="password" name="password" class="form-control p_input" placeholder="Contraseña" required/>
    <label id="icon"><i class="icon-shield"></i></label>
    <input type="password" name="password" class="form-control p_input" placeholder="Repite contraseña" required/>
</div>
<input type="hidden" name="role" value="administrador">
<div class="text-center">
    <button type="submit" onclick="window.location='http://localhost'">Registrar</button>
</div>                    
</div>
</form>
</div>

