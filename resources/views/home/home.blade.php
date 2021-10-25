@extends('plantilla-base')
@section('title', "Home")
@section('css')
    <style>
        .postSidebar{
            background-size:cover;
            background-position:center center;
            background-repeat:no-repeat;
        }
    </style>
@endsection
@section('header')
    <x-nav />
@endsection

@section('main')

    <section class="pt-5 mt-5 container-fluid" >
        <div class="row">

            {{--   posts   --}}
            <div class="col-12" >
                <div class="container-fluid">
                    <div class="row mh justify-content-around">

                        {{--  posts traidos desde la db  --}}
                        @foreach ($posts as $post)
                            {{-- variable booleana q controla q en cada post se muestre de portada solo la 1ra imagen asociada a el --}}
                            @php
                                $imgPortada = true;
                            @endphp
                            @foreach ($imgs as $img)
                                @if ($img->imageable_id == $post->id && $imgPortada == true)
                                        <div class="my-3 col-12 col-md-5 col-lg-3 mx-lg-1" >
                                            <div class="p-0 container-fluid h-100">
                                                <div class="p-0 rounded shadow row h-100">
                                                    <div class="p-0 m-0 col-12 col-sm-5 col-md-12 col-lg-5 bg-primary rounded-left">
                                                        <a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" ><img src="{{asset($img->url)}}" alt="" class="m-0 w-100 rounded-left" style="max-height:30vh;"></a>
                                                    </div>
                                                    <div class="col-12 col-sm-7 col-md-12 col-lg-7 d-flex flex-column align-items-start justify-content-around">
                                                        <div>
                                                            <h3><a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" >{{$post->title}}</a></h3>
                                                        </div>
                                                        <div>
                                                            <a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" ><span class="contenido-post small" >{{$post->summary}}</span></a>
                                                            <small><a href="{{route('post.show', $post)}}" class="seeMoreLink" > ..ver m&aacute;s </a></small>
                                                        </div>
                                                        <div class="my-2 w-100 d-flex justify-content-start " >
                                                            <div class="px-1 py-1 m-2 badge-pill bg-success" ><small>LifeStyle</small></div>
                                                            <div class="px-1 py-1 m-2 badge-pill bg-info" ><small>home</small></div>
                                                            <div class="px-1 py-1 m-2 badge-pill bg-warning" ><small>ropa y moda</small></div>
                                                        </div>
                                                        <div class="my-2 w-100 d-flex justify-content-between " >
                                                            <div class="d-flex align-items-center" >
                                                                <div class="mr-2 border rounded-circle" style="width:40px; height:40px;" >
                                                                    {{--  TODO: cambiar el condicional por if($imgAutor->url) --}}
                                                                    @php
                                                                        $imgSetted = false;
                                                                    @endphp
                                                                    @foreach ($imgsAutor as $imgAutor)
                                                                        @if ($imgAutor->imageable_id == $post->user_id)
                                                                            @if ($imgAutor->url != 'storage/posts/' && $imgAutor->url != null)
                                                                                <img src="{{asset($imgAutor->url)}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle'>
                                                                                @php
                                                                                    $imgSetted = true;
                                                                                @endphp
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                    @if ($imgSetted == false)
                                                                        <img src="{{asset('images/img-perfil-default.png')}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle'>
                                                                    @endif
                                                                </div>
                                                                <div class="d-flex flex-column align-items-start justify-content-around" >
                                                                    <span style="font-size:70%; font-weight:bold;" >{{$post->user->name}}</span>
                                                                    <span class="text-muted" style="font-size:80%;" >{{$post->created_at->diffForHumans()}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $imgPortada = false;
                                        @endphp
                                @endif
                            @endforeach
                                {{-- si no encuentra una imagen se le coloca un color de fondo x defecto --}}
                                @if ($imgPortada)

                                            <div class="my-3 col-12 col-md-5 col-lg-3 mx-lg-1" >
                                                <div class="p-0 container-fluid h-100">
                                                    <div class="p-0 rounded shadow row h-100">
                                                        <div class="col-12 d-flex flex-column align-items-start justify-content-around">
                                                            <div>
                                                                <h3><a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" >{{$post->title}}</a></h3>
                                                            </div>
                                                            <div>
                                                                <a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" ><span class="contenido-post small" >{{$post->summary}}</span></a>
                                                                <small><a href="{{route('post.show', $post)}}" class="seeMoreLink" > ..ver m&aacute;s </a></small>
                                                            </div>
                                                            <div class="my-2 w-100 d-flex justify-content-between " >
                                                                <div class="d-flex align-items-center" >
                                                                    <div class="mr-2 border rounded-circle" style="width:40px; height:40px;" >
                                                                        {{--  TODO: cambiar el condicional por if($imgAutor->url) --}}
                                                                        @php
                                                                            $imgSetted = false;
                                                                        @endphp
                                                                        @foreach ($imgsAutor as $imgAutor)
                                                                            @if ($imgAutor->imageable_id == $post->user_id)
                                                                                @if ($imgAutor->url != 'storage/posts/' && $imgAutor->url != null)
                                                                                    <img src="{{asset($imgAutor->url)}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle'>
                                                                                    @php
                                                                                        $imgSetted = true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                        @if ($imgSetted == false)
                                                                            <img src="{{asset('images/img-perfil-default.png')}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle'>
                                                                        @endif
                                                                    </div>
                                                                    <div class="d-flex flex-column align-items-start justify-content-around" >
                                                                        <span style="font-size:70%; font-weight:bold;" >{{$post->user->name}}</span>
                                                                        <span class="text-muted" style="font-size:80%;" >{{$post->created_at->diffForHumans()}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                @endif
                        @endforeach

                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection

@section('footer')

@endsection
@section('js')
    <script>
        window.addEventListener('load',function(){

            contenidoPost =  document.querySelectorAll('.contenido-post');
            seeMoreLink = document.querySelectorAll('.seeMoreLink');

            for (let i = 0; i < contenidoPost.length; i++) {
                seeMoreLink[0].style.display = 'none';
                content = contenidoPost[i].innerHTML;
                content = content.substr(0,100);

                if(contenidoPost[i].innerHTML.length>100){
                    contenidoPost[i].innerHTML = content ;
                    seeMoreLink[0].style.display = 'inline';
                }else{
                    contenidoPost[i].innerHTML = content;
                }

            }
        });
    </script>
@endsection
