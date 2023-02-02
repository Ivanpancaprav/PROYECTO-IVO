@guest
<a href="{{route('login')}}">Login</a>
@else
<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>
@endguest

<h1>ADMIN</h1>

@auth    <!--sirve para mostrar en caso de estar autentificado, estar logeado-->
{{dump(auth()->user()->name)}}
{{dump(auth()->user()->role)}}

@endauth
