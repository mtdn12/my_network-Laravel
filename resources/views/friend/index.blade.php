@extends('layout.layout')

@section('title','Welcome')


@section('content')
    @include('./inc/navbar_auth')
    @include('../inc/message')
    <div class ="row">
        <div class="col-sm-7 friend-list">
            <h1>Your Friends List</h1>
            @foreach($friends as $user)
             @include('../inc/user_block')
            @endforeach
        </div>
        <div class="col-sm-4 friend-request">
            <div>
                <h1>Your Friends Request</h1>
                @foreach($UserYouSendRequests as $user)
                @include('../inc/user_block')
                @endforeach
            </div>
            <div>
                <h2>User Send You Friend Request</h2>
                @foreach($userSendYouRequests as $user)
                @include('../inc/user_block')
                <br>              
                <a class="btn btn-primary" href="{{route('accept.friend',['user_name'=>$user->name])}}">Accept</a>
                @endforeach
            </div>
            
        </div>
    </div>
    
@endsection

