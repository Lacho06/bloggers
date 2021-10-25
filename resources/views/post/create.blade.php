@extends('plantilla-base')
@section('title', "Post")
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

        <section class="py-5 my-5 w-100" >

            <div class="container rounded-lg bg-light" >
                <div class="row">

                    <div class="p-2 col-12" >
                        <div class="container-fluid">
                            <div class="row justify-content-around">
                                <!-- form Titulo -->
                                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="col-11 d-flex">
                                    @csrf
                                    <input type="hidden" name="formType" value="1">
                                    <input type="text" name="titulo" placeholder="titulo" class="p-1 my-2 form-control tituloInput" >
                                    <button type="submit" class="my-1 ml-2 btn btn-sm btn-success text-nowrap" id="submitTitle" >Add Title</button>
                                </form>

                                <!-- form Estracto -->
                                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="col-11 col-sm-5 col-lg-3 d-flex flex-column center">
                                    @csrf
                                    <input type="hidden" name="formType" value="2">
                                    <textarea name="estracto" id="" rows="8" class="my-2 form-control estractoInput" placeholder="Extracto"></textarea>
                                    <button type="submit" class="mt-1 mb-3 btn btn-sm btn-success mb-lg-1 text-nowrap" id="submitEst" >Add Estracto</button>
                                </form>

                                <!-- form Descripcion -->
                                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="col-11 col-sm-5 col-lg-3 d-flex flex-column center" >
                                    @csrf
                                    <input type="hidden" name="formType" value="3">
                                    <textarea name="descripcion" id="" rows="8" class="my-2 form-control descripcionInput" placeholder="Descripcion"></textarea>
                                    <button type="submit" class="mt-1 mb-3 btn btn-sm btn-success mb-lg-1 text-nowrap" id="submitDesc" >Add Description</button>
                                </form>

                                <!-- form Imagen -->
                                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="col-11 col-sm-5 col-lg-3 center flex-column">
                                    @csrf
                                    <!-- img -->
                                    <div class="m-2 center flex-column" >
                                        <div id="mostrarImagen" style="width: 180px; height:180px;" class="rounded" >
                                            <!-- -------- AQUI PUEDE QUE HALLA UNA VULNERABILIDAD DEBIDO A Q ENLAZO LA FOTO CON SU RUTA TAL CUAL Y NO CON UN METODO ASSET DEBIDO A Q ESTOY EN UN COMPONENTE DE VUE --------------- -->
                                            <img src="../../../public/img/img-perfil-default.png" alt="" width="180" height="180" class="border rounded" id="imgPost" >
                                        </div>
                                        <input type="hidden" name="formType" value="4">
                                        <input type="file" name="file" id="multimediaCreate" onchange="addPic()" class="border-0" style="display: none; outline:0;" >
                                        <button type="button" onclick="document.getElementById('multimediaCreate').click();" class="mt-3 btn btn-dark">Browse...</button>
                                    </div>
                                    <!-- fin img -->
                                    <button type="submit" class="btn btn-success" id="submitImg" >Add Pic</button>
                                </form>

                                <!-- form Tags -->
                                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="col-11 col-sm-5 col-lg-3 d-flex flex-column center" >
                                    @csrf
                                    <input type="hidden" name="formType" value="5">
                                    <select name="tag" id="" class="p-2 m-3 rounded bg-dark text-light" >
                                        <option value="default" >SELECT TAG</option>
                                        <option value="tag1" >Tag1</option>
                                        <option value="tag2" >Tag2</option>
                                        <option value="tag3" >Tag3</option>
                                        <option value="tag4" >Tag4</option>
                                    </select>
                                    <button type="submit" class="mt-1 mb-3 btn btn-sm btn-success mb-lg-1 text-nowrap" id="submitDesc" >Add Tag</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

                <!-- VISTA PREVIA -->
            <section class="container py-5 mt-5 bg-light" >
                <div class="row">

                    <div class="col-10 " >
                        <h4 class="pl-5 ml-5" >Vista Previa</h4>
                    </div>

                    <div class="mb-5 col-12 col-md-7 col-lg-9">
                        <div class="container">
                            <div class="mt-5 row d-flex flex-column align-items-center justify-content-center">

                                <div class="col-10 " id="mostrarImagenVistaPrevia" ></div>

                                <div class="mt-4 col-10 mh" >
                                    <div class="container-fluid">
                                        <div class="py-2 row mh">

                                            <div class="p-4 col-9">
                                                <h2 >Titulo</h2>
                                                <p><small class="text-muted" >Estracto</small></p>
                                                <p>Descripcion</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="container-fluid">
                                                    <div class="row center ">
                                                        <div class="col-12 d-flex ">
                                                            <div class="my-2 border rounded-circle" style="width:55px; height:55px;" >
                                                                <!-- aqui va la imagen del autor o usuario q esta creando el post -->
                                                                <!-- {{-- @foreach ($imgsAutor as $imgAutor)
                                                                    @if ($imgAutor->imageable_id == $post->user_id)
                                                                        <img src="{{$imgAutor->getImageUrl}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle' >
                                                                    @endif
                                                                @endforeach --}} -->
                                                            </div>
                                                            <div class="ml-2 d-flex flex-column align-items-start justify-content-center" >
                                                                <span class="text-muted" style="font-size:80%;" >Autor</span>
                                                                <span style="font-size:130%; font-weight:bold;" >
                                                                    {{-- {{$post->user->name}} --}}
                                                                    John Dae
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

            <!-- buttons submit -->
            <div class="my-3 col-12 center ">
                <div>
                    <!-- <button type="button" class="btn btn-lg btn-dark w-100" onclick="document.getElementById('submitTitle').click(); document.getElementById('submitEst').click(); document.getElementById('submitDesc').click(); document.getElementById('submitImg').click(); alert('publicado');">PUBLICAR</button> -->
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="formType" value="5">
                        <input type="submit" class="btn btn-lg btn-dark w-100" value="Publicar">
                    </form>
                </div>
            </div>

        </section>

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
