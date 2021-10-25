@extends('plantilla-base')
@section('title', "Tag")
@section('css')

@endsection
@section('header')

@endsection
@section('main')
    @foreach ($tags as $tag)
        {{$tag}}
    @endforeach
@endsection
@section('footer')

@endsection
@section('js')

@endsection
