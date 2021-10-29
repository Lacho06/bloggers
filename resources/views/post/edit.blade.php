@extends('plantilla-base')
@section('title', "Post")
@section('css')
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            overflow-x: hidden;
        }
    </style>
@endsection
@section('header')
    <x-nav></x-nav>
@endsection
@section('main')
    {{-- esta vista solo se le muestra a los usuarios autenticados--}}

    @auth

    <section class="container py-5 my-5">
        <div class="row">
            <div class="col-12">

                <table class="table border table-hover table-sm" >
                    <thead>
                        <th>id</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th></th>
                    </thead>
                    <tbody>
                        {{-- @foreach ($posts as $post) --}}
                            <tr>
                                <td>id</td>
                                <td>$post->title}}</td>
                                <td>$post->summary}}</td>
                                <td class="d-flex" >
                                    <a href="#editModal" data-toggle="modal" data-target="#editModal" ><span class="mx-2" style="cursor: pointer;" ><img src="{{asset('img/icons/pencil/outline_edit_black_18dp.png')}}" alt=""></span></a>
                                    <form action="{{route('post.destroy', $post)}}" method="POST">
                                        @csrf @method('delete')
                                        <input type="submit" value="Borrar" style="display: none;" id="postDelete{{$post->id}}">
                                        <span class="mx-2" style="cursor: pointer;" onclick="document.querySelector('#postDelete{{$post->id}}').click();" ><img src="{{asset('img/icons/delete/outline_delete_black_18dp.png')}}" alt=""></span>
                                    </form>
                                </td>
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>

            </div>
        </div>
    </section>

    {{-- EDIT MODAL --}}
    <div id="editModal" class="modal fade" >
        <div class="modal-dialog" >
            <div class="modal-content" >
                <div class="modal-header" >
                    <h4 class="modal-title" >EDITAR</h4>
                    <button type="button" class="close" data-dismiss="modal" style="outline: 0;" >&times;</button>
                </div>
                <div class="modal-body" >
                    <form action="ruta" method="POST" enctype="multipart/form-data" class="form center flex-column" >
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        @php
                            $type_edit=false;
                        @endphp
                        @if ($type_edit)
                            <input type="text" class="form-control" placeholder="texto" name="" id="">
                        @else
                            <input type="file" name="multimediaCreate" id="multimediaCreate" class="border-0" style="display: none; outline:0;" >
                            <button type="button" onclick="document.getElementById('multimediaCreate').click();" class="mt-3 btn btn-dark">Seleccionar imagen...</button>
                        @endif
                        <button type="submit" class="mx-auto my-2 btn btn-sm btn-success" id="submitEdit">Actualizar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    @endauth

    @guest
        {{-- TODO: mensaje de error --}}
    @endguest

@endsection
@section('footer')

@endsection
@section('js')

@endsection
