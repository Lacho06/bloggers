@extends('plantilla-base')
@section('title', "Register")
@section('css')
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'noto_sans';
        }
        body{
            font-family: 'noto_sans';
        }
        .center{
            -webkit-display :flex;
            -moz-display :flex;
            -o-display :flex;
            display :flex;
            justify-content :center;
            align-items :center;
        }
        .containerRegister{
            background-image: url("{{asset('img/img-login-register.jpg')}}");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
        }

        /*FONTS*/
        @font-face{
            font-family:"noto_sans";
            src:url("{{asset('fonts/Noto_Sans/NotoSans-Regular.ttf')}}") format("truetype");
        }
        @font-face{
            font-family:"style_script";
            src:url("{{asset('fonts/StyleScript/StyleScript-Regular.ttf')}}") format("truetype");
        }
    </style>
@endsection
@section('header')

@endsection
@section('main')

    <main class="container-fluid vh-100 containerRegister">
        <div class="row center vh-100">
            <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 py-4 rounded mh bg-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 center">
                            <h1 style="font-family: 'noto_sans';">Register</h1>
                        </div>
                    </div>
                </div>
                <form action="{{route('register.store')}}" method="POST" enctype="multipart/form-data" class="w-100 h-100 m-0 px-0 px-sm-1 px-md-2 ">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-8 d-flex flex-column justify-content-around">
                                <input type="text" name="name" class="form-control my-2" placeholder="Username" value="{{old('name','')}}">
                                {!! $errors->first('name', '<small class="alert alert-danger">:message</small>') !!}
                                <input type="text" name="email" class="form-control my-2" placeholder="Email" value="{{old('email','')}}">
                                {!! $errors->first('email', '<small class="alert alert-danger">:message</small>') !!}
                            </div>
                            <div class="col-4 d-flex flex-column justify-content-around align-items-center">
                                <div id="mostrarImagen" style="width: 50px; height:50px;" class="border rounded-circle">
                                    <img src="{{asset('img/img-perfil-default.jpg')}}" alt="" width="50" height="50" class="rounded-circle">
                                </div>
                                <input type="file" name="file" id="multimedia" style="display: none;">
                                <button type="button" onclick="document.getElementById('multimedia').click();" class="btn btn-dark mt-3">Browse...</button>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="alias" class="form-control my-2" placeholder="Alias" value="{{old('alias','')}}">
                                {!! $errors->first('alias', '<small class="alert alert-danger">:message</small>') !!}
                                <input type="password" name="password" class="form-control my-2" placeholder="Password" value="{{old('password','')}}">
                                {!! $errors->first('password', '<small class="alert alert-danger">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 center">
                                <button type="submit" class="btn btn-dark mt-2">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('footer')

@endsection
@section('js')
        <script type="text/javascript">

            function iniciar(){
                cajadatos=document.getElementById('mostrarImagen');
                var archivos=document.getElementById('multimedia');
                archivos.addEventListener('change', procesar, false);
            }
            function procesar(e){
                var archivos=e.target.files;
                var archivo=archivos[0];
                if(!archivo.type.match(/image.*/i)){
                    alert('seleccione una imagen');
                }else{
                    var lector=new FileReader();
                    lector.onload=mostrar;
                    lector.readAsDataURL(archivo);
                }
            }
            function mostrar(e){
                var resultado=e.target.result;
                cajadatos.innerHTML='<img src="'+resultado+'" style="width:50px;height:50px;" class="rounded-circle" />';
            }
            window.addEventListener('load', iniciar, false);

        </script>
@endsection
