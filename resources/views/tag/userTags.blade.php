@extends('plantilla-base')
@section('title', "Tag")
@section('css')

@endsection
@section('header')
    <x-nav></x-nav>
@endsection
@section('main')

    @auth
        <section class="container py-5 my-5">
            <div class="row">
                <div class="col-12">
                    <h1>User Tags</h1>
                    <table class="table border table-hover table-sm" >
                        <thead>
                            <th>id</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>

                            @foreach ($tags as $tag)

                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td class="d-flex">
                                        {{--  <a href="route ver"><span class="mx-2" style="cursor: pointer;" ><img src="{{asset('img/icons/eye/outline_visibility_black_18dp.png')}}" alt=""></span></a>  --}}
                                        <a href="{{route('tag.edit', $tag)}}"><span class="mx-2" style="cursor: pointer;" ><img src="{{asset('img/icons/pencil/outline_edit_black_18dp.png')}}" alt=""></span></a>
                                        <a href="#asociarModal" data-toggle="modal" data-target="#asociarModal" >
                                            <span class="mx-2" style="cursor: pointer;" >
                                                <svg class="icon" style="width: 18px; heigth:18px; font-weight:800; font-size:120%; color:#000;" viewBox="0 0 20 20">
                                                    <path d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"></path>
                                                </svg>
                                            </span>
                                        </a>
                                        <form action="{{route('tag.destroy', $tag)}}" method="POST">
                                            @csrf @method('delete')
                                            <input type="submit" value="Borrar" style="display: none;" id="tagDelete{{$tag->id}}" >
                                            <span class="mx-2" style="cursor: pointer;" onclick="document.querySelector('#tagDelete{{$tag->id}}').click();" ><img src="{{asset('img/icons/delete/outline_delete_black_18dp.png')}}" alt=""></span>
                                        </form>
                                    </td>
                                </tr>


                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </section>

        {{-- ASOCIAR MODAL --}}
        <div id="asociarModal" class="modal fade" >
            <div class="modal-dialog" >
                <div class="modal-content" >
                    <div class="modal-header" >
                        <h4 class="modal-title" >Asociar a Posts</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" >
                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="form center flex-column" >
                            @csrf
                            {{-- <input type="hidden" name="post_id" value="{{$post->id}}"> --}}

                            <div class="m-2 p-3 border d-flex justify-content-around align-items-center w-100 " >
                                <div >
                                    <p class="m-0 py-0 " >Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                </div>
                                <input type="checkbox" class="mx-3" name="PostAsociado" id="PostAsociado">
                            </div>

                            <button type="submit" class="mx-auto my-2 btn btn-sm btn-success" id="asociarPostSubmit">Asociar</button>
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
        {{-- TODO: mensaje d error --}}
    @endguest

@endsection
@section('footer')

@endsection
@section('js')

@endsection
