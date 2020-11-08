<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noor Alam | @yield("title")</title>
    <meta name="author" content="Noor alam khan">
    <meta name="description" content="this is my portfolio site. I designed this using html,css,javascript,php/laravel framework and mysql">
    <meta name="keywords" content="portfolio,port,noor,alam,khan">
    <link rel="icon" href ="{{asset('images/icon.png')}}" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/all.min.js')}}"></script>
    <link rel="stylesheet" href="" id="theme-style" type="text/css">
</head>
<body>
    @include('frontend.partial.nav')

    @yield('content')


    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>
