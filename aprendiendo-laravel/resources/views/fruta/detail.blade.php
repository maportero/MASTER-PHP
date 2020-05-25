<h2>La fruta es: {{$fruta->nombre}}</h2>
<a href="{{ action('FrutaController@delete',['id' => $fruta->id ])}}">Eliminar</a><br/>
<a href="{{ action('FrutaController@edit',['id' => $fruta->id ])}}">Actualizar</a>
