<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    
    protected $table='likes';
    
    public function user(){
        
        return $this->belongsTo('App\user','user_id');
        
    }
    
    public function image(){
        
        return $this->belongsTo('App\image','image_id');
        
    }
}
