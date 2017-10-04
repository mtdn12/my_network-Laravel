@extends('layout.layout')

@section('title','Welcome')


@section('content')
    @include('./inc/navbar_auth')
    @include('../inc/message')
    
    <div class="profile-content">
        <div class="row">            
            <div class="col-sm-8  profile-about">
                <h1>About {{$user->name}}</h1>
                <ul class="profile-info">
                    <li>User Name : {{$user->name}}</li>
                    <li>Email : {{$user->email}}</li>
                    <li>Password : **********</li>                    
                </ul>
            </div>
            <div class="col-sm-3 profile-status" >
                 @if(Auth::user()->isFriendWith($user))
                    <p>You and {{$user->name}} are friend.</p>
                @else        
                    @if(Auth::user()->hasWaitingRequestAccept($user))            
                        <p>you already sent a friend request to {{$user->name}}</P>
                    @elseif(Auth::user()->canAcceptRequest($user))
                        <p>{{$user->name}} sent you a friend request. Please check.</P>
                    @elseif(Auth::user()->id==$user->id)
                    @else
                        <div>
                            <a href="{{route('add.friend',['user_name'=>$user->name])}}" class="btn btn-primary">Add Friend</a>
                        </div>
                    @endif            
                @endif  
            </div>
        </div>

        <div class="row profile-friends">
            <h1>List Friend</h1>
            @foreach($friends as $user)
                @include('../inc/user_block')
            @endforeach
        </div>
    
    </div>
    
    
@endsection

