<h1>Listado de Frutas</h1>
<h3><a href="{{ action('FrutaController@create') }}">Crear Fruta</a></h3>
@if (session('status'))
<p style="color:green"> {{ session('status') }}</p>
@endif
<ul>
    @foreach($frutas as $fruta)
        <li>
            <a href="{{ action('FrutaController@detail',['id' => $fruta->id ])}}">
                {{$fruta->nombre}}</a></li>
    @endforeach
</ul>

