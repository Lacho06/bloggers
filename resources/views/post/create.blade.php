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
                                            <div id="mostrarImagen" style="width: 180px; height:180px;" class="rounded">
                                                <img src="{{asset('img/img-perfil-default.png')}}" alt="" width="180" height="180" class="border rounded" id="imgPost" >
                                            </div>
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <input type="hidden" name="formType" value="4">
                                            <input type="file" name="multimediaCreate" id="multimediaCreate" class="border-0" style="display: none; outline:0;" >
                                            <button type="button" onclick="document.getElementById('multimediaCreate').click();" class="mt-3 btn btn-dark">Browse...</button>
                                        </div>
                                        <!-- fin img -->
                                        <button type="submit" disabled class="btn btn-success" id="submitImg" >Add Pic</button>
                                    </form>

                                    <!-- btn Tags -->
                                    <div class="my-5 center">
                                        <button type="button" class="btn btn-dark text-uppercase" data-toggle="modal" data-target="#tagModal">Select Tag</button>
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
                            <input type="hidden" name="post_id" value="{{$post->id}}">
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

                        <div class="mb-5 col-12 ">
                            <div class="container">
                                <div class="mt-5 row d-flex flex-column align-items-center justify-content-center">

                                    {{-- <div class="col-10" id="mostrarImagenVistaPrevia"></div> --}}

                                    <div class="mt-4 col-10 mh" >
                                        <div class="container-fluid">
                                            <div class="py-2 row mh">

                                                <div class="p-4 col-12 center flex-column">
                                                    <h2>{{$post->title}}</h2>
                                                    @isset($post->summary)
                                                        <p><small class="text-muted">{{$post->summary}}</small></p>
                                                    @endisset
                                                    @isset($orderPost)
                                                        @foreach ($orderPost as $order)
                                                            @if ($order->itemable_type == $img)
                                                                @foreach ($images as $i)
                                                                    @if ($order->itemable_id == $i->id)
                                                                        <img src="{{asset($i->url)}}" alt="">
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                @foreach ($texts as $i)
                                                                    @if ($order->itemable_id == $i->id)
                                                                        <p>{{$i->text}}</p>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                </div>

                                                <div class="col-12">
                                                    <div class="container-fluid">
                                                        <div class="row ">
                                                            <div class="col-12 col-md-6 center">
                                                                <div class="my-2 border rounded-circle" style="width:55px; height:55px;" >
                                                                    <!-- aqui va la imagen del autor o usuario q esta creando el post -->
                                                                    {{--  TODO: quitar el storage/posts/ del condicional  --}}
                                                                    @if ($imgAutor->url != null && $imgAutor->url != 'storage/posts/')
                                                                        <img src="{{$imgAutor->url}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle'>
                                                                    @else
                                                                        <img src="{{asset('img/img-perfil-default.png')}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle'>
                                                                    @endif
                                                                </div>
                                                                <div class="ml-2 center flex-column" >
                                                                    <div class="d-flex align-items-center " >
                                                                        <span class="mr-2 text-muted " style="font-size:80%;" >Autor </span>
                                                                        <span style="font-size:130%; font-weight:bold;" >
                                                                            {{$post->user->name}}
                                                                        </span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center " >
                                                                        <span class="mr-2 text-muted " style="font-size:80%;" >Fecha </span>
                                                                        <span style="font-weight:bold;" >
                                                                            {{$post->created_at->diffForHumans()}}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 center" >
                                                                <div class="center">
                                                                    @foreach ($post->tags as $tag)
                                                                        <div class="px-3 py-1 m-2 badge-pill" style="border:1px solid {{$tag->color}};">{{$tag->name}}</div>
                                                                    @endforeach
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
                                    @php
                                        $vacio = false;
                                    @endphp
                                    @forelse ($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @empty
                                            <option value="default">No hay tags disponibles</option>
                                            @php
                                                $vacio = true;
                                            @endphp
                                    @endforelse
                                </select>
                                @if ($vacio)
                                    <button type="submit" class="mx-auto my-2 btn btn-sm btn-success" disabled id="submitTag">Add Tag</button>
                                    @else
                                    <button type="submit" class="mx-auto my-2 btn btn-sm btn-success" id="submitTag">Add Tag</button>
                                @endif
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
            submitImg = document.getElementById('submitImg');
            mostrarImagen = document.getElementById('mostrarImagen');
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
        function mostrar(ev){
            var resultado=ev.target.result;
            // cajadatos.innerHTML='<img src="'+resultado+'" style="max-height:300px;" class="rounded" />';
            submitImg.disabled=false;
            mostrarImagen.innerHTML='<img src="'+resultado+'" alt="" width="180" height="180" class="border rounded"  />';
        }
        window.addEventListener('load', iniciar, false);

    </script>

@endsection
