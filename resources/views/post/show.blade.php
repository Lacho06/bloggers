@extends('plantilla-base')
@section('title', "Show Post")
@section('css')

@endsection
@section('header')
    <x-nav />
@endsection
@section('main')

    <section class="container-fluid mt-5 pt-5 ">
        <div class="row">
            {{-- Post details --}}
            <div class="col-12 col-md-7 col-lg-9 mb-5">
                <div class="container">
                    <div class="row d-flex flex-column align-items-center justify-content-center mt-5">
                        <div class="col-10 center my-4">
                            <h1 class="text-center" >Post Details</h1>
                        </div>
                        <div class="col-10 center">
                            <img src="{{asset('storage/posts/img-ejemplo.jpg')}}" class="rounded-lg " style="max-width:100%;" alt="">
                        </div>
                        <div class="col-10 mh mt-4" >   
                            <div class="container-fluid">
                                <div class="row mh py-2">
                                    <div class="col-12 col-lg-3 order-last order-lg-first rounded shadow">
                                        <div class="container-fluid">
                                            <div class="row center ">
                                                <div class="col-12 d-flex flex-column align-items-center ">
                                                    <div class="border rounded-circle my-2" style="width:55px; height:55px;" >
                                                        {{-- @foreach ($imgsAutor as $imgAutor)
                                                            @if ($imgAutor->imageable_id == $post->user_id)
                                                                <img src="{{$imgAutor->getImageUrl}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle' >
                                                            @endif
                                                        @endforeach --}}
                                                    </div>
                                                    <div class="d-flex flex-column align-items-center justify-content-center" >
                                                        <span class="text-muted" style="font-size:80%;" >Autor</span>
                                                        <span style="font-size:130%; font-weight:bold;" >{{$post->user->name}}</span>
                                                        <span class="text-muted" style="font-size:80%;" >{{$post->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-9 p-4">
                                        <h2>{{$post->title}}</h2>
                                        <p>{{$post->summary}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- sidebar --}}
            <x-sidebar />
        </div>
    </section>
    <!-- <p>{{$post->id}}</p>
    <p>{{$post->title}}</p>
    <p>{{$post->summary}}</p>
    <p>{{$post->user_id}}</p>
    @isset($imgAutor->getImageUrl)
        <img src="{{$imgAutor->getImageUrl}}" width="300px" height="300px" alt="Imagen del autor">
    @endisset
    @foreach ($post->texts as $text)
        <p>{{$text->text}}</p>
    @endforeach
    @foreach ($post->tags as $tag)
        <p style="color: {{$tag->color}}">{{$tag->name}}</p>
    @endforeach
    @foreach ($imgs as $img)
        @isset($img->url)
            @if ($img->url != null)
                <img src="{{asset($img->url)}}" width="300px" height="300px" alt="Imagen del post">
            @endif
        @endisset
    @endforeach -->


@endsection
@section('footer')

@endsection
@section('js')

@endsection
