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

//use App\Image;

Route::get('/', function () {
    /*
    $images = Image::all();
    
    foreach ($images as $image){
        
        echo $image->image_path.'</br>';
        echo $image->description.'</br>';
        echo $image->user->nick.'</br>';
        echo '<strong> Comentarios </strong></br>';
        
        foreach ($image->comments as $comment){
            
            echo 'usuario: '.$comment->user->nick.' dice: '. $comment->content.'</br>';
           
            
        }
        
        echo 'Me gusta: '.count($image->likes).'</br>';
        
        echo '<hr/>';
        
    }
    die();
    */
    
    
    
    return view('welcome');
});

//GENERALES
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//USUARIOS
Route::get('/configuracion', 'UserController@config')->name('config');
Route::get('/user/avatar/{filename}', 'UserController@image')->name('user.avatar');
Route::get('/user/index/{search?}', 'UserController@index')->name('user.index');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/profile/{id}','UserController@profile')->name('user.profile');

//IMAGENES

Route::get('/image/create', 'ImageController@create')->name('image.create');
Route::get('/image/edit/{id}', 'ImageController@edit')->name('image.edit');
Route::post('/image/save','ImageController@save')->name('image.save');
Route::post('/image/update','ImageController@update')->name('image.update');
Route::get('/image/getImage/{filename}', 'ImageController@getImage')->name('image.getImage');
Route::get('/image/detail/{id}', 'ImageController@detail')->name('image.detail');
Route::get('/image/delete/{id}', 'ImageController@delete')->name('image.delete');

//COMENTARIOS
Route::post('/comment/store','CommentController@store')->name('comment.store');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

//LIKES
Route::get('/like/{id}','LikeController@like')->name('like.save');
Route::get('/disLike/{id}','LikeController@disLike')->name('like.delete');
Route::get('/likes','LikeController@index')->name('likes');

