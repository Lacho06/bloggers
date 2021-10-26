@extends('plantilla-base')
@section('title', "Create Tag")
@section('css')

@endsection
@section('header')
    <x-nav></x-nav>
@endsection
@section('main')

    <div class="container my-5 py-5 ">
        <div class="row center" >
            <div class="col-8 bg-light p-4">
                <form action="" class="form border-0 container-fluid " >
                    <div class="row justify-content-around ">
                        <div class="col-4">
                            <input type="text" name="tag" id="" class="form-control" placeholder="Nombre de la etiqueta" >
                        </div>
                        <div class="col-4">
                            <label class="center" >
                                Color:&nbsp;
                                <input type="color" name="color" id="" value="#000" placeholder="Selecciona un color" >
                            </label>
                        </div>
                        <div class="col-12">
                            <div class="center my-4" >
                                <button type="submit" class="btn btn-success text-capitalize align-self-end " >Crear</button>
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
