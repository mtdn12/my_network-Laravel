@extends('layout.layout')

@section('title','Welcome')

@section('content')
    @include('./inc/navbar_guest')
    @include('../inc/message')
    <div class="row">
        <div class="col-sm-6">
            <div class="welcome__page">
                <div>
                    <h1>Welcome to My-Network</h1>
                    <p>Connect and share with the people around the world.</p>
                </div>
            </div>           
        </div>
        <div class="col-sm-6">
            @include('./register/register')
        </div>
    </div>
@endsection

