@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Usuarios</h1>
            <hr>
            <form method="GET" action="{{route('user.index')}}" id="search-form">
                
                <div class="row">
                    <div class="form-group col-md-8">
                        <input type="text" id="search" class="form-control" />
                    </div>
                    <div class="form-group col btn-search">
                        <input type="submit" class="btn btn-primary" value="Buscar">             
                    </div>
                </div>
            </form>
            <hr>
        @foreach($users as $user)
            <div class='profile-user'>
                
                    @if ($user->image_path)
                        <div class='container-avatar'>
                            <img src="{{ route('user.avatar', ['filename' => $user->image_path]) }}" class="avatar">
                        </div>
                    @endif
                <div class='user-info'>
                    
                    <h2>{{'@'.$user->nick}}</h2>
                    <h3>{{$user->name.' '.$user->surname}}</h3>
                    <p>{{'Se unió: '.\FormatTime::LongTimeFilter($user->created_at) }}</p>
                    <a href="{{route('user.profile',['id' => $user->id])}}" class="btn btn-sm btn-success">Visitar perfil</a>
                  
                </div>
                    <div class="clearfix"></div>
                    <hr>
            </div>
        @endforeach
        
        {{$users->links()}}

        </div>
    </div>
</div>
@endsection

