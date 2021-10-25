@extends('plantilla-base')
@section('title', "Tag")
@section('css')

@endsection
@section('header')

@endsection
@section('main')

    <div class="container my-5">
        <div class="row center" >
            <div class="p-4 col-8 bg-light">
                <form action="" class="border-0 form container-fluid " >
                    <div class="row justify-content-around ">
                        <div class="col-4">
                            <input type="text" name="tag" id="" class="form-control" placeholder="Nombre de la etiqueta" >
                        </div>
                        <div class="col-4">
                            <label class="center" >
                                Color:&nbsp;
                                <input type="color" name="color" id="" value="#000" placeholder="Selecciona un color">
                            </label>
                        </div>
                        <div class="col-12">
                            <div class="my-4 center" >
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
