<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @forelse ($users as $user)
    <li> 
    {{$user->nombre}} {{$user->email}} 
         <a href="{{ route('editar', $user->dni)}}" >Edit</a> <!--añadimos también EDITAR-->
         <form action="{{ route('bajaPaciente', $user->dni)}}" method="post"> <!--añadimos también BORRAR-->
            @csrf
            @method('DELETE')
            <button type="submit">borrar</button>
        </form>
    </li>
    @empty
    <li>NO HAY NADA </li>
    @endforelse


    <a href="/altaPaciente">Volver</a>
    
</body>
</html>




