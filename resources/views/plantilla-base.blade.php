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


    {{--  Design styles  --}}
<style>
    /*FONTS*/
    @font-face{
        font-family:"noto_sans";
        src:url("{{asset('fonts/Noto_Sans/NotoSans-Regular.ttf')}}") format("truetype");
    }
    @font-face{
        font-family:"style_script";
        src:url("{{asset('fonts/StyleScript/StyleScript-Regular.ttf')}}") format("truetype");
    }

    * {
        -webkit-box-sizing:border-box; 
        -moz-box-sizing:border-box;
        box-sizing:border-box;
        padding : 0;
        margin : 0;
        outline :0;
        border:0;
        font-family: 'noto_sans';
    }

    body {
        color:#000000;
        background :#ffffff;
        overflow-x: hidden;
    }

    body *{
        outline: 0;
    }

    ul > li{
            list-style: none;
    }

    .center{
        -webkit-display :flex;
        -moz-display :flex;
        -o-display :flex;
        display :flex;
        justify-content :center;
        align-items :center;
    }

    .icon {
        display: inline-block;
        width: 1em;
        height: 1em;
        stroke-width: 0;
        stroke: currentColor;
        fill: currentColor;
    }

    .cap {        
        z-index :2;
    }

    .transition {
            transition :all 2s ease  ;
    }

    .zoom-bg {
            transition :background-size transform 2s ease  ;
    }

    .zoom-bg:hover{
            background-size :120% 120%;
            transition : background-size 2s ease;
    }

    .zoom-fit{
            transition:transform 2s ease;
    }

    .zoom-fit:hover{
            transform :scale(1.25 , 1.25);
            transition :transform 2s ease;
    }

    .mh{
            -webkit-min-height :200px; 
            -moz-min-height :200px; 
            -o-min-height :200px; 
            min-height :200px; 
    }

    .mh-md{
            -webkit-min-height :350px; 
            -moz-min-height :350px; 
            -o-min-height :350px; 
            min-height :350px; 
    }

    .mh-lg {
            -webkit-min-height :500px; 
            -moz-min-height :500px; 
            -o-min-height :500px; 
            min-height :500px; 
    }
    /* ----------------- */
    .containerRegister{
        background-image: url("{{asset('img/img-login-register.jpg')}}");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
    }
    .bg-white-transparent{
        background:rgb(255,255,255,0.6);
    }
</style>
{{--  Design styles  --}}


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

     {{-- activar toast --}}
    <script >
        $(document).ready(function(){
            $('.toast').toast('show');
            
            $('#btnToasts').click(function(){
                $('#mitoast').toast('show');
            });
            
            $('#btnOcultar').click(function(){
                $('#mitoast').toast('hide');
            });
            
        });
    </script>

    {{--  Bootstrap 4 scripts  --}}

    @yield('js')

</body>
</html>