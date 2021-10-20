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
        <create-component :route="'{{route('post.store')}}'">
            {{ csrf_field() }}
        </create-component>
    </div>

@endsection
@section('footer')

@endsection
@section('js')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
