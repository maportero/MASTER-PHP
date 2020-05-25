<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    
    // Relacion one to many
    public function comments(){
        
        return $this->hasMany('App\Comment')->orderBy('id','desc');
        
    }
    
    // Relacion one to many
    public function likes(){
        
        return $this->hasMany('App\Like');
        
    }
    
    //Relación de Muchos a Uno
    
    public function user(){
        
        return $this->belongsTo('App\User','user_id');
        
    }
    
}
