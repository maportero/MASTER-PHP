<h1>Formulario Laravel</h1>
<form action="{{ action('PeliculaController@recibir') }}" method="POST">
    {{ csrf_field() }}
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" />
    <br/>
    <label for="email">Email</label>
    <input type="email" name="email" />
     <br/>
    <input type="submit" value="Enviar" />
    
</form>

    