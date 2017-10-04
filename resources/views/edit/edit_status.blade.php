@extends('layout.layout')

@section('title','Edit-Status')

@section('content')
    @include('./inc/navbar_auth')
    @include('../inc/message')
    <div class="edit-content">
        <form action="" method="POST" class="form">
        <div class="form-group">
            <label for="boy_status" class="label control-label">Your Status:</label>
            <textarea name="body" id="boy_status" class="form-control">{{$status->body}}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
        <input type="hidden" name="_token" value="{{Session::token()}}">  
        </form>
    </div>
@endsection
