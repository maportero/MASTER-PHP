<div class="card pub_image">
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
        <div class="image-container">
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
        <div class="comments">
            <a href="{{ route('image.detail',['id' => $image->id]) }}" class='btn btn-sm btn-warning btn-comments'>Comentarios ({{count($image->comments)}})</a>
        </div>
    </div>
</div>