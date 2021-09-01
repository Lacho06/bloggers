@extends('plantilla-base')
@section('title', "Post")
@section('css')

@endsection
@section('header')

@endsection
@section('main')

    <p>{{$post->id}}</p>
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
    @endforeach


@endsection
@section('footer')

@endsection
@section('js')

@endsection
