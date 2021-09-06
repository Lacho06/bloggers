@extends('plantilla-base')
@section('title', "Post")
@section('css')

@endsection
@section('header')

@endsection
@section('main')
    {{-- esta vista solo se le muestra a los usuarios autenticados--}}

    {{--  en esta vista va una tabla donde cada dato forma parte d una columna  --}}

    @foreach ($posts as $post)
        {{$post->id}}
        {{$post->title}}
        {{$post->summary}}
        <a href="{{route('post.show', $post)}}">Ver detalles</a>
        <a href="{{route('post.edit', $post)}}">Editar</a>
        <form action="{{route('post.destroy', $post)}}" method="POST">
            @csrf @method('delete')
            <input type="submit" value="Borrar">
        </form>
    @endforeach

@endsection
@section('footer')

@endsection
@section('js')

@endsection
