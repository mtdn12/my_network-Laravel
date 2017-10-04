<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My-Network - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
<body>
    <div class="container">          
        @yield('content')
        @include('../inc/footer')
    </div>

    <script rel="stylesheet" src="{{asset('js/app.js')}}"></script>
    <script rel="stylesheet" src="{{asset('js/custom.js')}}"></script>
</body>
</html>