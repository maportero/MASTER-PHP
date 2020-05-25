<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    echo '<h1>Hola Mundo!!</h1>';
});

//Route::get('/listado-frutas','FrutaController@index');
Route::group(['prefix'=>'frutas'],function(){
    Route::get('index','FrutaController@index');
    Route::get('detail/{id}','FrutaController@detail');
    Route::get('create','FrutaController@create');
    Route::post('save','FrutaController@save');
    Route::get('delete/{id}','FrutaController@delete');
    Route::get('edit/{id}','FrutaController@edit');    
    Route::post('update','FrutaController@update');

});

Route::get('/peliculas/{pagina?}','PeliculaController@index');

Route::get('/redirigir','PeliculaController@redirigir');

Route::get('/formulario','PeliculaController@formulario');
Route::post('/recibir','PeliculaController@recibir');

Route::get('/detalle/{anio?}',[
    'middleware' => 'testyear',
    'uses' => 'PeliculaController@detalle',
    'as' => 'detalle.pelicula'
    ]);
Route::resource('usuario','UsuarioController');

/*

Route::get('/mostrar-fecha', function () {
    $titulo = 'Mostrando la fecha actual';
    return view('mostrar-fecha', array (
        'titulo' => $titulo
    ) );
});

Route::get('/pelicula/{titulo}/{year?}', function($titulo = 'Pelicula sin titulo', $year = '2019'){
    return view('pelicula', array(
       'titulo' => $titulo,
       'year' => $year
    ));
    
})->where(array(
    'titulo' => '[a-zA-z]+',
    'year' => '[0-9]+'
));

Route::get('/listado-peliculas', function (){
    $titulo='Listado de peliculas';
    $peliculas= array('Start Wars','Terminator','Advangers');
    return view('peliculas.listado')
        ->with('peliculas',$peliculas)
       ->with('titulo',$titulo);
    
});

Route::get('/pagina-generica', function(){
    
    return view('pagina');
    
});
 */