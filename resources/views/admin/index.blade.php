@extends('plantilla-base')
@section('title', "Post")
@section('css')

@endsection
@section('header')

@endsection
@section('main')

    <section class="containe-fluid">
        <div class="row">
            {{-- sidebar --}}
            <div class="col-3">
                <x-admin-sidebar></x-admin-sidebar>
            </div>
            {{-- content --}}
            <div class="col-lg-11 col-9 ">
                <section class="container-fluid" >
                    <div class="row vh-100">
                        <div class="col-12 h-100 center">
                            <x-admin-table></x-admin-table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

@endsection
@section('footer')

@endsection
@section('js')

@endsection
