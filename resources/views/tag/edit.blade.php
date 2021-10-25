@extends('plantilla-base')
@section('title', "Edit Tag")
@section('css')

@endsection
@section('header')
    <x-nav></x-nav>
@endsection
@section('main')

<section class="container my-5 py-5">
    <div class="row">
        <div class="col-12">

            <table class="table  table-hover table-sm border" >
                <thead>
                    <th>id</th>
                    <th>Title</th>
                </thead>
                <tbody>

                        <tr>
                            <td>1</td>
                            <td>Nombre Tag</td>
                            <td class="d-flex" >
                                <a href="route ver"><span class="mx-2" style="cursor: pointer;" ><img src="{{asset('img/icons/eye/outline_visibility_black_18dp.png')}}" alt=""></span></a>
                                <a href="route editar"><span class="mx-2" style="cursor: pointer;" ><img src="{{asset('img/icons/pencil/outline_edit_black_18dp.png')}}" alt=""></span></a>
                                <a href="route asociar al post">
                                    <span class="mx-2" style="cursor: pointer;" >
                                        <svg class="icon" style="width: 18px; heigth:18px; font-weight:800; font-size:120%; color:#000;" viewBox="0 0 20 20">
                                            <path d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"></path>
                                        </svg>
                                    </span>
                                </a>
                                <form action="route eliminar" method="POST">
                                    @csrf @method('delete')
                                    <input type="submit" value="Borrar" style="display: none;" id="postDelete" >
                                    <span class="mx-2" style="cursor: pointer;" onclick="document.querySelector('#postDelete').click();" ><img src="{{asset('img/icons/delete/outline_delete_black_18dp.png')}}" alt=""></span>
                                </form>
                            </td>
                        </tr>

                </tbody>
            </table>

        </div>
    </div>
</section>

@endsection
@section('footer')

@endsection
@section('js')

@endsection
