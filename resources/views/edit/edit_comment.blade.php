@extends('layout.layout')

@section('title','Edit-Comment')


@section('content')
    @include('./inc/navbar_auth')
    @include('../inc/message')
    <div class="edit-content">
        <form action="" method="POST" class="form">
        <div class="form-group">
            <label for="body_comment" class="label control-label">Your Comment:</label>
            <textarea name="body" id="body_comment" class="form-control">{{$comment->body}}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
        <input type="hidden" name="_token" value="{{Session::token()}}">  
        </form>
    </div>
@endsection

