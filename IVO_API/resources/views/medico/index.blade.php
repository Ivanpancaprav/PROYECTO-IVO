@forelse ($datos as $item)
<li> 
{{$item->nombre}} {{$item->descripcion}} 
     <a href="{{ route('editar', $item->id)}}" >Edit</a> <!--añadimos también EDITAR-->
     <form action="{{ route('borrar', $item->id)}}" method="post"> <!--añadimos también BORRAR-->
        @csrf
        @method('DELETE')
        <button type="submit">borrar</button>
    </form>
</li>
@empty
<li>NO HAY NADA </li>
@endforelse