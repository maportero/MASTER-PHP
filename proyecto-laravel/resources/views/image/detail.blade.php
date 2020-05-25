@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
            
            <div class="card pub_image image-detail">
                <div class="card-header">
                    @if($image->user->image_path)
                    <div class="container-avatar">
                        <img src="{{ route('user.avatar', ['filename' => $image->user->image_path ]) }}" class="avatar">
                    </div>
                    @endif

                    <div class="data-user">
                        <a href="{{route('user.profile',['id' => $image->user_id])}}">
                            {{$image->user->name.' '.$image->user->surname }}
                            <span class="nickname">
                                {{ ' | @'.$image->user->nick}}
                            </span>
                        </a>
                    </div>
                </div>


                <div class="card-body">
                    <div class="image-container image-detail">
                        <img src="{{ route('image.getImage', ['filename' => $image->image_path]) }}" >
                    </div>

                    <div class="image-description">
                        <span class="nickname">{{ '@'.$image->user->nick}}</span>
                        <span class="nickname">{{' | '.\FormatTime::LongTimeFilter($image->created_at) }}</span>
                        <p>{{ $image->description }}</p>                       
                    </div>
                    <div class="likes">
                        <?php $user_like = false ?>
                        @foreach ($image->likes as $like)
                        @if($like->user->id == Auth::user()->id)
                        <?php $user_like = true ?>
                        @endif

                        @endforeach

                        @if($user_like)
                        <img src="{{asset('img/heart-red.png')}}" class="btn-dislike" data-id='{{$image->id}}'>
                        @else
                        <img src="{{asset('img/heart-black.png')}}" class="btn-like" data-id='{{$image->id}}'>
                        @endif

                    </div >
                    <div class="count-likes"> {{ count($image->likes) }} </div>
                    @if($image->user_id == Auth::user()->id )
                    <div class='actions'>
                        <a href="{{route('image.edit',['id'=>$image->id]) }}" class="btn btn-sm btn-primary">Actualizar</a>
                        <!--<a href="{{route('image.delete',['id'=>$image->id])}}" class="btn btn-sm btn-danger">Eliminar</a>-->    

                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                            Eliminar
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Advertencia!!</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Si elimina la imagen, no la podra recuperarla. Esta seguro?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a href="{{route('image.delete',['id'=>$image->id])}}" class="btn btn-primary">Si</a>   
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                   @endif
                   <div class="clearfix"></div>
                   <div class="comments">
                       <h2>Comentarios ({{count($image->comments)}})</h2>
                       <hr>
                       <form method="POST" action="{{route('comment.store')}}">
                           @csrf
                           <input type="hidden" name="image_id" value="{{$image->id}}">
                           <p>
                               <textarea name="content" class="form-control {{$errors->has('content')? 'is-invalid':'' }}" ></textarea>
                           

                           @if ($errors->has('content'))
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('content') }}</strong>
                           </span>
                           @endif
                           </p>
                           <button class="btn btn-success" type="submit">
                               Enviar
                           </button>

                           
                       </form>
                      <hr>
                       @foreach($image->comments as $comment)

                       <div class="comment">
                           <span class="nickname">{{ '@'.$comment->user->nick}}</span>
                           <span class="nickname">{{' | '.\FormatTime::LongTimeFilter($comment->created_at) }}</span>
                           <p>{{ $comment->content }}</br>
                               
                           @if (Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))

                                <a href="{{route('comment.delete',['id' => $comment->id] )}}" class='btn btn-sm btn-danger'>
                                    Eliminar
                                </a>
                           @endif
                           
                           </p> 
                       </div>


                       @endforeach

                   </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
