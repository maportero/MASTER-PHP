<!DOCTYPE HTML>

<html lang="es">
    
    <head>
        <meta charset="utf-8" />
        <title>Titulo - @yield('titulo')</title>
    </head>
    <body>
        @section('header')
            CABECERA DE LA WEB (master)
        @show
        
        <div class="container">
            @yield('content')
        </div>
        
        @section('footer')
            PIE DE PAGINA DE LA WEB (master)
        @show     
    </body>
</html>
