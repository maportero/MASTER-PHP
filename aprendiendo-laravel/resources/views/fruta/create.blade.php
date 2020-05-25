@if (isset($fruta) && is_object($fruta))
    <h1>Editar Fruta</h1>
@else
   <h1>Crear Fruta</h1>
@endif


<form action="{{ isset($fruta) ? action('FrutaController@update') : action('FrutaController@save') }}" method="post">
    {{ csrf_field() }}
    
    @if (isset($fruta) && is_object($fruta))
        <input type="hidden" name="id" value='{{ $fruta->id}}'/>
    @endif

    <label for='nombre' >Nombre:</labe>
    <input type="text" name="nombre" value='{{ $fruta->nombre ?? ""}}'/><br/>
    
    <label for='precio' >Precio:</labe>
    <input type="text" name="precio" value='{{ $fruta->precio ?? ""}}'/><br/>
    
    <label for='descripcion' >Descripcion:</labe>
    <input type="text" name="descripcion" value='{{ $fruta->descripcion ?? ""}}'/>  <br/>  
    
    <input type="submit" value="Enviar" />
    
</form>
