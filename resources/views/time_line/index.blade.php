@extends('layout.layout')

@section('title','Welcome')


@section('content')
    @include('./inc/navbar_auth')
    @include('../inc/message')
    @include('../inc/content_block')
@endsection

