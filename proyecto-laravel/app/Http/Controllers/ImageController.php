<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Comment;
use App\Like;

class ImageController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {

        return view('image.create');
    }

    public function save(Request $request) {
        
        $validate = $this->validate($request, [
            'image_path' => 'required|image',
            'description' => 'required'
        ]);
        
        
        $image_path = $request->file('image_path');
        $description = $request->input('description');


        $image = new Image();
        $user = \Auth::user();
        $image->user_id = $user->id; 
        $image->description = $description;
        
        if($image_path){
            
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
                        
        }
        
        $image->save();
        
        return redirect()->route('home')->with([
            "message" => "La foto ha sido cargada satisfactoriamente"
        ]);
    }
    public function getImage($filename){
        
        $file = Storage::disk('images')->get($filename);
        
        return new Response($file,200);
        
    }
    
    public function detail($id){
        
        $image = Image::find($id);
        
        return view('image.detail',[
            'image' => $image
        ]);
        
    }
    
    public function delete($id){
        
        $user = \Auth::user();
        $image = Image::find($id);
        
        if ($user && $image && $image->user_id == $user->id){
        
            $comments = Comment::where('user_id',$user->id)
                                ->where('image_id',$id)
                                ->get();
            
            if ($comments){
                
                foreach($comments as $comment){
                    
                    $comment->delete();
                }
            }
                

            $likes = Like::where('user_id',$user->id)
                                ->where('image_id',$id)
                                ->get();

            if ($likes){
                
                foreach($likes as $like){
                    
                    $like->delete();
                }
            }
            
            Storage::disk('images')->delete($image->image_path);
            
            $image->delete();

            return redirect()->route('home')->with(["message"=>"La imagen ha sido eliminada satisfactoriamente"]);
        
        }else{
            return redirect()->route('home')->with(["message"=>"No se pudo eliminar la imagen"]);
            
        }
        
    }
    
    public function edit($id){
        $user = \Auth::user();
        $image = Image::find($id);
        
        if ($user && $image && $image->user_id == $user->id){
            return view('image.edit',[
                        'image' => $image
        ]);
        }else{
             return redirect()->route('home');

        }
    }

    public function update(Request $request) {
        
        $validate = $this->validate($request, [
            'image_path' => 'image',
            'description' => 'required'
        ]);
        
        $image_id =  $request->input('image_id');
        $image_path = $request->file('image_path') != null ? $request->file('image_path') : false ;
        $description = $request->input('description');

        
        $image = Image::find($image_id);
        $user = \Auth::user();
        
        
        if($user && $image && $user->id == $image->user_id){
                      
            $image->description = $description;
            
            if($image_path){
                
                $image_path_name = time().$image_path->getClientOriginalName();
                Storage::disk('images')->put($image_path_name, File::get($image_path));
                Storage::disk('images')->delete($image->image_path);
                $image->image_path = $image_path_name;
                
            } 
           
            
            $image->update();
        
             return redirect()->route('image.detail',["id"=>$image_id])->with([
                    "message" => "La foto ha sido actualizada satisfactoriamente"
             ]);
            
        }else{
            return redirect()->route('image.detail',["id"=>$image_id])->with([
                "message" => "La foto no ha sido actualizada"
             ]);
        }
        

    }

//
}
