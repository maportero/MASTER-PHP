<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;

class CommentController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request){
        
        
        $validate = $this->validate($request, [
            "image_id" => "integer|required",
            "content" => "string|required"
        ]);
        
        $content = $request->input("content");
        $image_id = $request->input("image_id");
        $user = \Auth::user();
        
        $comment = new Comment();
        $comment->image_id=$image_id;
        $comment->user_id=$user->id;
        $comment->content=$content;
        
        $comment->save();
        
        
        return redirect()->route('image.detail',["id" => $image_id])->with([
            "message" => "El comentario ha sido guardado satisfactoriamente"
        ]);
        
    }
    
    public function delete($id){
        
        $user = \Auth::user();
        $comment = Comment::find($id);
        
        
        if ($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
            
            $comment->delete();
             return redirect()->route('image.detail',["id" => $comment->image_id])->with([
            "message" => "El comentario ha sido eliminado satisfactoriamente"
            ]);
            
            
        }else{
            
            return redirect()->route('image.detail',["id" => $comment->image_id])->with([
            "message" => "El comentario no se ha eliminado"
            ]);
            
        }
        
    }
}
