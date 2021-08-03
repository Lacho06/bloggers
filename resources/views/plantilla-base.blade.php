<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloggers - @yield('title')</title>


    {{--  Bootstrap 4 styles  --}}

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    {{--  Bootstrap 4 styles  --}}

    @yield('css')
</head>
<body>

    @yield('header')

    @yield('main')

    @yield('footer')


    {{--  Bootstrap 4 scripts  --}}

    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    {{--  Bootstrap 4 scripts  --}}

    @yield('js')
</body>
</html>