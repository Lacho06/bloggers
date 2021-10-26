@extends('plantilla-base')
@section('title', "Edit Tag")
@section('css')

@endsection
@section('header')
    <x-nav/>
@endsection
@section('main')

    <div class="container py-5 my-5 ">
        <div class="row center">
            <div class="p-4 col-8 bg-light">
                <form action="{{route('tag.update', $tag)}}" method="POST" class="border-0 form container-fluid">
                    @csrf @method('put')
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="row justify-content-around">
                        <div class="col-4">
                            <input type="text" name="name" value="{{old('name', $tag->name)}}" class="form-control" placeholder="Nombre de la etiqueta">
                        </div>
                        <div class="col-4">
                            <label class="center">
                                Color:&nbsp;
                                <input type="color" name="color" value="{{old('color', $tag->color)}}" placeholder="Selecciona un color">
                            </label>
                        </div>
                        <div class="col-12">
                            <div class="my-4 center">
                                <button type="submit" class="btn btn-success text-capitalize align-self-end">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('footer')

@endsection
@section('js')

@endsection
