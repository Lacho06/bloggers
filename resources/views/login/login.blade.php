@extends('plantilla-base')
@section('title', "Login")
@section('css')
@endsection
@section('header')
@endsection
@section('main')
<main class="container-fluid vh-100 containerRegister">
    <div class="row center vh-100">
        <div class="rounded col-4 bg-white-transparent" >  <!-- col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 py-4 -->
            <div class="px-0 container-fluid">
                <div class="shadow-lg row">
                    <div class="col-12">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 center">
                                    <h1 style="font-family: 'noto_sans';" class="mt-3" >Login</h1>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('login.store')}}" method="POST" class="px-0 m-0 my-3 w-100 h-100 px-sm-1 px-md-2 ">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="email" class="my-3 form-control bg-white-transparent" placeholder="Email" value="{{old('email','')}}">
                                        {!! $errors->first('email', '<small class="alert alert-danger">:message</small>') !!}
                                        <input type="password" name="password" class="my-3 form-control bg-white-transparent" placeholder="Password" value="{{old('password','')}}">
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
                                        <button type="submit" class="mt-2 btn btn-dark">Log in</button>
                                        <a href="{{route('register.create')}}" class="mt-2 btn btn-outline-secondary">Sign Up</a>
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
                    <form action="{{route('login.forget')}}" method="POST" enctype="multipart/form-data" class="form center flex-column" >
                        @csrf
                        <input type="email" name="email" id="email"  class="my-2 form-control " placeholder="Email" value="" >
                        <input type="text" name="alias" id="alias"  class="my-2 form-control " placeholder="Alias" value="" >
                        <input type="password" name="contrasena" id="contrasena" class="my-2 form-control " placeholder="New Password" >
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
