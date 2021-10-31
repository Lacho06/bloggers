@extends('plantilla-base')
@section('title', "Post")
@section('css')

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
                            <th>Nombre</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('post.edit', $post)}}"><span class="mx-2" style="cursor: pointer;" ><img src="{{asset('img/icons/pencil/outline_edit_black_18dp.png')}}" alt=""></span></a>
                                        <form action="{{route('post.destroy', $post)}}" method="POST">
                                            @csrf @method('delete')
                                            <input type="submit" value="Borrar" style="display: none;" id="postDelete" >
                                            <span class="mx-2" style="cursor: pointer;" onclick="document.querySelector('#postDelete').click();" ><img src="{{asset('img/icons/delete/outline_delete_black_18dp.png')}}" alt=""></span>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
    @endauth

    @guest
        {{-- TODO: mensaje d error --}}
    @endguest



@endsection
@section('footer')

@endsection
@section('js')

@endsection






