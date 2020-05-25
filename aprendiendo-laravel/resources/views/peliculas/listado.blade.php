@include('includes.head')
<hr>
<h1>{{$titulo}} </h1>
<h2><?=$peliculas[0]?></h2>
<p>{{date('Y')}}</p>

{{-- COMENTARIO BLADE --}}

{{ $director ?? '' or 'No hay director' }}

@if (!$titulo)
  {{$titulo}}
@else
 <h2> No existe </h2>
@endif 

@for ($i=0; $i <=20 ; $i++)
<h3>EL numero es: {{$i}} </h3>
@endfor

<hr>

<?php $contador = 0 ?>

@while ($contador <= 20)
    <h4>El contador es: {{$contador}}</h4>
    <?php $contador++ ?>
@endwhile

<hr>

@foreach ($peliculas as $pelicula)
    <h5>{{$pelicula}}</h5>
@endforeach
<hr>
@include('includes.foot')