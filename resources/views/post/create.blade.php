@extends('plantilla-base')
@section('title', "Post")
@section('css')

@endsection
@section('header')
    <x-nav />
@endsection
@section('main')
    {{-- esta vista solo se le muestra a los usuarios autenticados--}}

    <div class="py-5 my-5" id="app">
        <create-component :route1="'{{route('home')}}'" :route2="'{{route('home')}}'" :route3="'{{route('home')}}'" :route4="'{{route('home')}}'"  ></create-component>
    </div>

@endsection
@section('footer')

@endsection
@section('js')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
