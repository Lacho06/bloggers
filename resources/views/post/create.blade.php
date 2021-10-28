@extends('plantilla-base')
@section('title', "Create Post")
@section('css')
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            overflow-x: hidden;
        }
    </style>
@endsection
@section('header')
    <x-nav />
@endsection
@section('main')
    {{-- esta vista solo se le muestra a los usuarios autenticados--}}
    @auth

        <section class="py-5 my-5 w-100" >

            <div class="container rounded-lg bg-light" >
                <div class="row">

                    <div class="p-2 col-12" >
                        <div class="container-fluid">
                            <div class="row justify-content-around">

                                @isset($post)

                                    <!-- form Estracto -->
                                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="col-11 col-sm-5 col-lg-3 d-flex flex-column center">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <input type="hidden" name="formType" value="2">
                                        <textarea name="estracto" id="" rows="8" class="my-2 form-control estractoInput" placeholder="Extracto"></textarea>
                                        <button type="submit" class="mt-1 mb-3 btn btn-sm btn-success mb-lg-1 text-nowrap" id="submitEst" >Add Estracto</button>
                                    </form>

                                    <!-- form Descripcion -->
                                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="col-11 col-sm-5 col-lg-3 d-flex flex-column center" >
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <input type="hidden" name="formType" value="3">
                                        <textarea name="descripcion" id="" rows="8" class="my-2 form-control descripcionInput" placeholder="Descripcion"></textarea>
                                        <button type="submit" class="mt-1 mb-3 btn btn-sm btn-success mb-lg-1 text-nowrap" id="submitDesc" >Add Description</button>
                                    </form>

                                    <!-- form Imagen -->
                                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="col-11 col-sm-5 col-lg-3 center flex-column">
                                        @csrf
                                        <!-- img -->
                                        <div class="m-2 center flex-column">
                                            <div id="mostrarImagen" style="width: 180px; height:180px;" class="rounded" >
                                                <!-- -------- AQUI PUEDE QUE HALLA UNA VULNERABILIDAD DEBIDO A Q ENLAZO LA FOTO CON SU RUTA TAL CUAL Y NO CON UN METODO ASSET DEBIDO A Q ESTOY EN UN COMPONENTE DE VUE --------------- -->
                                                <img src="../../../public/img/img-perfil-default.png" alt="" width="180" height="180" class="border rounded" id="imgPost" >
                                            </div>
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <input type="hidden" name="formType" value="4">
                                            <input type="file" name="file" id="multimediaCreate" onchange="addPic()" class="border-0" style="display: none; outline:0;" >
                                            <button type="button" onclick="document.getElementById('multimediaCreate').click();" class="mt-3 btn btn-dark">Browse...</button>
                                        </div>
                                        <!-- fin img -->
                                        <button type="submit" class="btn btn-success" id="submitImg" >Add Pic</button>
                                    </form>

                                    <!-- btn Tags -->
                                    <div class="my-5 center">
                                        <button type="button" class="btn btn-outline-dark text-uppercase" data-toggle="modal" data-target="#tagModal">Select Tag</button>
                                    </div>

                                    @else

                                        <!-- form Titulo -->
                                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="col-11 d-flex">
                                            @csrf
                                            <input type="hidden" name="formType" value="1">
                                            <input type="text" name="titulo" placeholder="titulo" class="p-1 my-2 form-control tituloInput" >
                                            <button type="submit" class="my-1 ml-2 btn btn-sm btn-success text-nowrap" id="submitTitle" >Add Title</button>
                                        </form>

                                @endisset

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @isset($post)

                <!-- buttons submit -->
                <div class="my-5 col-12 center ">
                    <div>
                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="formType" value="6">
                            <input type="submit" class="btn btn-lg btn-dark w-100" value="Publicar">
                        </form>
                    </div>
                </div>

            @else

                <!-- buttons submit -->
                <div class="my-5 col-12 center ">
                    <div>
                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="formType" value="6">
                            <input type="submit" class="btn btn-lg btn-dark w-100" disabled value="Publicar">
                        </form>
                    </div>
                </div>

            @endisset

            @isset($post)

                <!-- VISTA PREVIA -->
                <section class="container py-5 mt-5 bg-light" >
                    <div class="row">

                        <div class="col-10 " >
                            <h4 class="pl-5 ml-5">Vista Previa</h4>
                        </div>

                        <div class="mb-5 col-12 col-md-7 col-lg-9">
                            <div class="container">
                                <div class="mt-5 row d-flex flex-column align-items-center justify-content-center">

                                    <div class="col-10" id="mostrarImagenVistaPrevia"></div>

                                    <div class="mt-4 col-10 mh" >
                                        <div class="container-fluid">
                                            <div class="py-2 row mh">

                                                <div class="p-4 col-9">
                                                    <h2>{{$post->title}}</h2>
                                                    @isset($post->summary)
                                                        <p><small class="text-muted">{{$post->summary}}</small></p>
                                                    @endisset
                                                    @isset($post->texts)
                                                        @foreach ($post->texts as $text)
                                                            <p>{{$text->text}}</p>
                                                        @endforeach
                                                    @endisset
                                                </div>

                                                <div class="col-12">
                                                    <div class="container-fluid">
                                                        <div class="row center">
                                                            <div class="col-12 d-flex ">
                                                                <div class="my-2 border rounded-circle" style="width:55px; height:55px;" >
                                                                    <!-- aqui va la imagen del autor o usuario q esta creando el post -->
                                                                    {{--  @foreach ($imgsAutor as $imgAutor)
                                                                        @if ($imgAutor->imageable_id == $post->user_id)
                                                                            <img src="{{$imgAutor->url}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle' >
                                                                        @endif
                                                                    @endforeach  --}}
                                                                </div>
                                                                <div class="ml-2 d-flex flex-column align-items-start justify-content-center" >
                                                                    <span class="text-muted" style="font-size:80%;" >Autor</span>
                                                                    <span style="font-size:130%; font-weight:bold;" >
                                                                        {{$post->user->name}}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </section>


            @endisset


        </section>

        @isset($post)

            {{-- TAG MODAL --}}
            <div id="tagModal" class="modal fade" >
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                            <h4 class="modal-title" >Select Tag</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" >
                            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="form center flex-column" >
                                @csrf
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <input type="hidden" name="formType" value="5">
                                <select name="tag" id="" class="form-control">
                                    {{--  <option value="default" disabled>SELECT TAG</option>  --}}
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="mx-auto my-2 btn btn-sm btn-success" id="submitTag">Add Tag</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        @endisset


    @endauth
    @guest
        {{-- TODO: mensaje de error --}}
    @endguest



@endsection
@section('footer')

@endsection
@section('js')

    <script type="text/javascript">

        function iniciar(){
            cajadatos=document.getElementById('mostrarImagenVistaPrevia');
            var archivos=document.getElementById('multimediaCreate');
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
            cajadatos.innerHTML='<img src="'+resultado+'" style="max-height:300px;" class="rounded" />';
        }
        window.addEventListener('load', iniciar, false);

    </script>

@endsection
