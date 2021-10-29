@extends('plantilla-base')
@section('title', "Show Post")
@section('css')

@endsection
@section('header')
    <x-nav />
@endsection
@section('main')

    <section class="container-fluid my-5 py-5 ">
        <div class="row mh" >

            <div class="col-12 ">
                <div class="d-flex justify-content-around align-items-center w-100" >
                    <div>
                        <h4>{{$post->title}}</h4>
                    </div>
                    <div class="center" >
                        <div class="my-2 border rounded-circle" style="width:55px; height:55px;" >
                            <!-- aqui va la imagen del autor o usuario q esta viendo el post -->
                            {{--  @foreach ($imgsAutor as $imgAutor)
                                @if ($imgAutor->imageable_id == $post->user_id)
                                    <img src="{{$imgAutor->url}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle' >
                                @endif
                            @endforeach  --}}
                        </div>
                        <div class="ml-2 center flex-column" >
                            <div class="d-flex align-items-center " >
                                <span class="text-muted mr-2 " style="font-size:80%;" >Autor </span>
                                <span style="font-size:130%; font-weight:bold;" >
                                    {{$post->user->name}}
                                </span>
                            </div>
                            <div class="d-flex align-items-center " >
                                <span class="text-muted mr-2 " style="font-size:80%;" >Fecha </span>
                                <span style="font-weight:bold;" >
                                    28, oct, 2021
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 my-4" >
                <p class="text-center" >{{$post->summary}}</p>
            </div>

            <div class="col-12">
                <div class="container-fluid">
                    <div class="row mh">
                        <div class="col-12 col-md-8 d-flex flex-column align-items-center justify-content-between py-5 " >
                            <div class="bg-dark center rounded-lg" >
                                <img src="{{asset('img/img-login-register.jpg')}}" class="rounded-lg" style="max-height:300px;" alt="">
                            </div>
                            <div class="my-4" >
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum optio ea totam praesentium eaque harum quis non sit, ratione, quia ad! Cumque deserunt a ipsa veritatis, vero at fuga corporis molestias ex pariatur unde perspiciatis dignissimos. Voluptates impedit nesciunt sint.</p>
                            </div>
                            <div class="my-2" >
                                {{-- si el usuario es el dueño de ese post q pueda editar desde aqui --}}
                                {{-- <a href="{{route('post.edit', $post)}}"><span class="mx-2" style="cursor: pointer;" ><img src="{{asset('img/icons/pencil/outline_edit_black_18dp.png')}}" alt=""></span></a> --}}
                            </div>
                        </div>
                        {{-- sidebar --}}
                        <div class="col-12 col-md-4 " >
                            <x-sidebar/>
                        </div>
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
