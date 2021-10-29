@extends('plantilla-base')
@section('title', "Tag")
@section('css')

@endsection
@section('header')

@endsection
@section('main')
    <p>Tag</p>
    <p>{{$tag->id}}</p>
    <p>{{$tag->name}}</p>
    @foreach ($postsRelacionados as $relacionados)
        <p>{{$relacionados->title}}</p>
        <p>{{$relacionados->summary}}</p>
        <br>
        <p>Tags</p>
        @foreach ($relacionados->tags as $tag)
            <p>{{$tag->name}}</p>
            <p>{{$tag->color}}</p>
        @endforeach
        <p>User</p>
        @foreach ($users as $user)
            @if ($user->id == $relacionados->user_id)
                <p>Autor: <span>{{$user->name}}</span></p>
            @endif
        @endforeach
        <p>{{$relacionados->created_at->diffForHumans()}}</p>
    @endforeach
@endsection
@section('footer')

@endsection
@section('js')

@endsection
