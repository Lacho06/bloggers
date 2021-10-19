@extends('plantilla-base')
@section('title', "Post")
@section('css')

@endsection
@section('header')
    <x-nav />
@endsection
@section('main')
    {{-- esta vista solo se le muestra a los usuarios autenticados--}}
    @php
        $titulo = "route('post.store', 1)";
        $resumen = "route('post.store', 2)";
        $descripcion = "route('post.store', 3)";
        $imagen = "route('post.store', 4)";
    @endphp
    <div class="py-5 my-5" id="app">
        <create-component :routeTitle="'{{$titulo}}'" :routeSummary="'{{$resumen}}'" :routeDescription="'{{$descripcion}}'" :routeImage="'{{$imagen}}'"></create-component>
    </div>

@endsection
@section('footer')

@endsection
@section('js')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
