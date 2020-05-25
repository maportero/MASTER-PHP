<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PeliculaController extends Controller
{
    public function index($pagina=1){
        $titulo='Listado de mis peliculas';
        return view('pelicula.index',
                ['titulo'=>$titulo],
                ['pagina'=>$pagina]
        );
        
    }
    
    public function detalle($anio = null) {

        return view('pelicula.detalle');
    }
    
    public function redirigir() {

        return redirect()->action('PeliculaController@detalle');
        
    }
    
    public function formulario(){
        
        return view('pelicula.formulario');
    }
    
    public function recibir(Request $resultado){
        $nombre = $resultado -> input('nombre');
        $email = $resultado -> input('email');
        
        echo $nombre;
        die();
        
    }
}
