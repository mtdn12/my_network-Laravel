@extends('layout.layout')

@section('title','Welcome')


@section('content')
    @include('./inc/navbar_auth')
    @include('../inc/message')   
    @if(count($users)==0)    
    <p>Can't found that person.</p>
    @endif
   @foreach($users as $user)
        @include('../inc/user_block')        
    @endforeach
@endsection

