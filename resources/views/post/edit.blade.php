@extends('plantilla-base')
@section('title', "Post")
@section('css')

@endsection
@section('header')
    <x-nav></x-nav>
@endsection
@section('main')
    {{-- esta vista solo se le muestra a los usuarios autenticados--}}

    {{--  en esta vista va una tabla donde cada dato forma parte d una columna  --}}

    <section class="container my-5 py-5">
        <div class="row">
            <div class="col-12">

                <table class="table  table-hover table-sm border" >
                    <thead>
                        <th>id</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th></th>
                    </thead>
                    <tbody>
                        
                            <tr>
                                <td>1</td>
                                <td>titulo</td>
                                <td>Summary</td>
                                <td class="d-flex" >
                                    <a href="#postModal" data-toggle="modal" data-target="#postModal" ><span class="mx-2" style="cursor: pointer;" ><img src="{{asset('img/icons/pencil/outline_edit_black_18dp.png')}}" alt=""></span></a>
                                    <form action="ruta eliminar" method="POST">
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

    {{-- POST MODAL --}}
    <div id="postModal" class="modal fade" >
        <div class="modal-dialog" >
            <div class="modal-content" >
                <div class="modal-header" >
                    <h4 class="modal-title" >Select Post</h4>
                    <button type="button" class="close" data-dismiss="modal"  >&times;</button>
                </div>
                <div class="modal-body" >
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" class="form center flex-column" >
                        @csrf
                        <input type="hidden" name="formType" value="5">
                        <select name="tag" id="" class="form-control " >
                            <option value="default" >SELECT POST</option>
                            <option value="tag1" >Post1</option>
                            <option value="tag2" >Post2</option>
                            <option value="tag3" >Post3</option>
                            <option value="tag4" >Post4</option>
                        </select>
                        <button type="submit" class="mx-auto my-2 btn btn-sm btn-success" id="submitTag" >Add Post</button>
                    </form>
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-danger" data-dismiss="modal"  >Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    

@endsection
@section('footer')

@endsection
@section('js')

@endsection
