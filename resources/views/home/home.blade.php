@extends('plantilla-base')
@section('title', "Home")
@section('css')

@endsection
@section('header')
    <x-nav />
@endsection

@section('main')

    <section class="container-fluid mt-5 pt-5" >
        <div class="row mh ">

            <!-- posts -->
            <div class="col-12 col-md-7 col-lg-9">
                <div class="container">
                    <div class="row mh justify-content-around">

                        <div class="col-11 center border mh mb-5 mt-3"><h1>Posts</h1></div>

                        <div class="col-5 center border mh mb-3"><h2>Posts</h2></div>
                        <div class="col-5 center border mh mb-3"><h2>Posts</h2></div>
                        <div class="col-5 center border mh mb-3"><h2>Posts</h2></div>
                        <div class="col-5 center border mh mb-3"><h2>Posts</h2></div>

                    </div>
                </div>
            </div>

            <!-- sidebar -->
            <div class="d-none d-md-flex col-md-5 col-lg-3 ">
                <div class="container">
                    <div class="row">
                        <div class="col-12 center border mh my-3"><h3>Posts</h3></div>
                        <div class="col-12 center border mh my-3"><h3>Posts</h3></div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    
@endsection

@section('footer')

@endsection
@section('js')

@endsection
