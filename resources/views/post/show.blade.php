@extends('plantilla-base')
@section('title', "Show Post")
@section('css')

@endsection
@section('header')
    <x-nav />
@endsection
@section('main')

    <section class="py-5 my-5 container-fluid ">
        <div class="row mh">

            <div class="col-12 ">
                <div class="d-flex justify-content-around align-items-center w-100" >
                    <div>
                        <h4>{{$post->title}}</h4>
                    </div>
                    <div class="center">
                        <div class="my-2 border rounded-circle" style="width:55px; height:55px;">
                            <!-- aqui va la imagen del autor o usuario q esta viendo el post -->
                            @if ($imgAutor->url != null && $imgAutor->url != 'storage/posts/')
                                <img src="{{asset($imgAutor->url)}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle'>
                                @else
                                <img src="{{asset('images/img-perfil-default.png')}}" alt="Imagen del autor" class='w-100 h-100 rounded-circle'>
                            @endif
                        </div>
                        <div class="ml-2 center flex-column">
                            <div class="d-flex align-items-center">
                                <span class="mr-2 text-muted " style="font-size:80%;">Autor</span>
                                <span style="font-size:130%; font-weight:bold;">
                                    {{$post->user->name}}
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="mr-2 text-muted " style="font-size:80%;">Fecha</span>
                                <span style="font-weight:bold;" >
                                    {{$post->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @isset($post->summary)
                <div class="my-4 col-12" >
                    <p class="text-center">{{$post->summary}}</p>
                </div>
            @endisset

            <div class="col-12">
                <div class="container-fluid">
                    <div class="row mh">
                        <div class="py-5 col-12 col-md-8 d-flex flex-column align-items-center justify-content-between " >
                            <div class="rounded-lg bg-dark center" >
                                <img src="{{asset('img/img-login-register.jpg')}}" class="rounded-lg" style="max-height:300px;" alt="">
                            </div>
                            <div class="my-4">
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
                            <div class="my-2">
                                {{-- si el usuario es el dueño de ese post q pueda editar desde aqui --}}
                                {{-- <a href="{{route('post.edit', $post)}}"><span class="mx-2" style="cursor: pointer;" ><img src="{{asset('img/icons/pencil/outline_edit_black_18dp.png')}}" alt=""></span></a> --}}
                            </div>
                        </div>
                        {{-- sidebar --}}
                        <div class="col-12 col-md-4">
                            {{-- TODO: pendiente pasarle la lista de relacionados al sidebar --}}
                            {{--  @foreach ($relacionados as $relacionado)
                                {{$relacionado->id}}
                                {{$relacionado->title}}
                            @endforeach  --}}
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
