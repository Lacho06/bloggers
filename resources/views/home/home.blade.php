@extends('plantilla-base')
@section('title', "Home")
@section('css')

@endsection
@section('header')
    <x-nav />
@endsection

@section('main')

    <section class="container-fluid mt-5 pt-5" >
        <div class="row mh">

            {{--   posts   --}}
            <div class="col-12 col-md-7 col-lg-9">
                <div class="container">
                    <div class="row mh justify-content-around">

                        {{--  posts traidos desde la db  --}}
                        @foreach ($posts as $post)
                            {{-- variable booleana q controla q en cada post se muestre de portada solo la 1ra imagen asociada a el --}}
                            @php
                                $imgPortada = true;
                            @endphp
                            @foreach ($imgs as $img)
                                @if ($img->imageable_id == $post->id && $imgPortada == true)
                                    @php
                                        $imgPortada = false;
                                    @endphp
                                    <a href="{{route('post.show', $post)}}"><div style="background: url('{{asset($img->url)}}');">
                                        <h2>{{$post->title}}</h2>
                                        <p>{{$post->summary}}</p>
                                        <span>Autor</span>
                                        @foreach ($imgsAutor as $imgAutor)
                                            @if ($imgAutor->imageable_id == $post->user_id)
                                                <img src="{{$imgAutor->getImageUrl}}" alt="Imagen del autor">
                                            @endif
                                        @endforeach
                                        <h3>{{$post->user->name}}</h3>
                                        <span>Fecha: <b>{{$post->created_at->diffForHumans()}}</b></span>
                                    </div></a>
                                @endif
                            @endforeach
                            {{-- sino encuentra una imagen se le coloca un color de fondo x defecto --}}
                            @if ($imgPortada)
                                <a href="{{route('post.show', $post)}}"><div style="background-color: cadetblue;">
                                    <h2>{{$post->title}}</h2>
                                    <p>{{$post->summary}}</p>
                                    <span>Autor</span>
                                    @foreach ($imgsAutor as $imgAutor)
                                        @if ($imgAutor->imageable_id == $post->user_id)
                                            <img src="{{$imgAutor->getImageUrl}}" alt="Imagen del autor">
                                        @endif
                                    @endforeach
                                    <h3>{{$post->user->name}}</h3>
                                    <span>Fecha: <b>{{$post->created_at->diffForHumans()}}</b></span>
                                </div></a>
                            @endif
                        @endforeach


                        <div class="col-11 center border mh mb-5 mt-3"><h1>Posts</h1></div>

                        <div class="col-5 center border mh mb-3"><h2>Posts</h2></div>
                        <div class="col-5 center border mh mb-3"><h2>Posts</h2></div>
                        <div class="col-5 center border mh mb-3"><h2>Posts</h2></div>
                        <div class="col-5 center border mh mb-3"><h2>Posts</h2></div>

                    </div>
                </div>
            </div>

            {{--   sidebar   --}}
            <div class="d-none d-md-flex col-md-5 col-lg-3 ">
                <div class="container">
                    <div class="row">
                        <div class="col-12 center border mh my-3"><h3>Posts</h3></div>
                        <div class="col-12 center border mh my-3"><h3>Posts</h3></div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('footer')

@endsection
@section('js')

@endsection
