<h1>{{$titulo}}</h1>

@if (isset($pagina))
   <h3>La pagina es: {{$pagina}}</h3>
@endif

<a href="{{ route('detalle.pelicula') }}">Ir al Detalle </a>