@extends('layout.layout')

@section('title','Dasboard')

@section('content')
    @include('./inc/navbar_auth')
    @include('../inc/message')
    <section class="row status-post">
    <h3>What do you want to say?</h3>
    <form action="{{route('post-status')}}" method="post">
        <div class="form-group {{$errors->has('status')? 'has-error':''}}">
            <textarea class="form-control"  name="status" id="new-post" rows="5" placeholder="Your post"></textarea>
        </div>
        @if($errors->has('status'))
            <span class="help-block">{{$errors->first('status')}}</span>
        @endif
        <input class="btn btn-primary" role="button" type="submit" value="Create Post">
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
    </section>
    @include('../inc/content_block')
@endsection

