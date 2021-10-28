@extends('plantilla-base')
@section('title', "Login")
@section('css')
@endsection
@section('header')
@endsection
@section('main')
<main class="container-fluid vh-100 containerRegister">
    <div class="row center vh-100">             
        <div class="col-4 rounded bg-white-transparent" >  <!-- col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 py-4 -->
            <div class="container-fluid px-0">
                <div class="row shadow-lg">
                    <div class="col-12">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 center">
                                    <h1 style="font-family: 'noto_sans';" class="mt-3" >Login</h1>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('login.store')}}" method="POST" class="w-100 h-100 m-0 px-0 px-sm-1 px-md-2 my-3 ">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="email" class="form-control my-3 bg-white-transparent" placeholder="Email" value="{{old('email','')}}">
                                        {!! $errors->first('email', '<small class="alert alert-danger">:message</small>') !!}
                                        <input type="password" name="password" class="form-control my-3 bg-white-transparent" placeholder="Password" value="{{old('password','')}}">
                                        {!! $errors->first('password', '<small class="alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="#passwordModal" data-toggle="modal" data-target="#passwordModal" class="mb-2">forget password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 center flex-column">
                                        <button type="submit" class="btn btn-dark mt-2">Log in</button>
                                        <a href="{{route('register.create')}}" class="btn btn-outline-secondary mt-2">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    {{-- FORGET PASSWORD MODAL --}}
    <div id="passwordModal" class="modal fade" >
        <div class="modal-dialog" >
            <div class="modal-content" >
                <div class="modal-header" >
                    <h4 class="modal-title" >Forget Password?</h4>
                    <button type="button" class="close" data-dismiss="modal" style="border:0; outline:0;" >&times;</button>
                </div>
                <div class="modal-body" >
                    <form action="ruta" method="POST" enctype="multipart/form-data" class="form center flex-column" >
                        @csrf
                        <input type="hidden" name="post_id" value="id">
                        <input type="email" name="email" id="email"  class="form-control my-2 " placeholder="Email" value="" >
                        <input type="text" name="alias" id="alias"  class="form-control my-2 " placeholder="Alias" value="" >
                        <input type="password" name="contrasena" id="contrasena" class="form-control my-2 " placeholder="New Password" >
                        <button type="submit" class="mx-auto my-2 btn btn-sm btn-success" id="submitTag">Cambiar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('footer')

@endsection
@section('js')

@endsection
