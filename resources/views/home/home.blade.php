@extends('plantilla-base')
@section('title', "Home")
@section('css')
    <style>
        .postSidebar{
            background-size:cover;
            background-position:center center;
            background-repeat:no-repeat;
        }
    </style>
@endsection
@section('header')
    <x-nav />
@endsection

@section('main')

    <x-alert type={{false}} >
        false
    </x-alert>

    <section class="container-fluid mt-5 pt-5" >
        <div class="row">

            {{--   posts   --}}
            <div class="col-12" >
                <div class="container-fluid">
                    <div class="row mh justify-content-around">

                        {{--  posts traidos desde la db  --}}
                        @foreach ($posts as $post)
                            {{-- variable booleana q controla q en cada post se muestre de portada solo la 1ra imagen asociada a el --}}
                            @php
                                $imgPortada = true;
                            @endphp
                            @foreach ($imgs as $img)
                                @if ($img->imageable_id == $post->id && $imgPortada == true)
                                    @php
                                        $imgPortada = false;
                                    @endphp

                                        <div class="col-12 col-md-5 col-lg-3 mx-lg-1 my-3" >
                                            <div class="container-fluid h-100 p-0">
                                                <div class="row h-100 p-0  shadow rounded position-relative PostWithOutImage " >
                                                    <div class="w-100 cap position-absolute d-flex align-items-end " style="bottom:0; height:30px;" >
                                                        <div class="d-flex mb-1" >
                                                            <small class="mx-2" ><a href="" class="text-white" >tag1</a></small>
                                                            <small class="mx-2" ><a href="" class="text-white" >tag2</a></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-5 col-md-12 col-lg-5 bg-primary m-0 p-0 rounded-left">
                                                        <a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" ><img src="{{asset($img->url)}}" alt="" class="w-100 m-0 rounded-left" style="max-height:30vh;"  ></a>
                                                    </div>    
                                                    <div class="col-12 col-sm-7 col-md-12 col-lg-7 d-flex flex-column align-items-start justify-content-around">
                                                        <div>
                                                            <h3><a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" >{{$post->title}}</a></h3>
                                                        </div>
                                                        <div>
                                                            <a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" ><span class="contenido-post small" >{{$post->summary}}</span></a>
                                                            <small><a href="{{route('post.show', $post)}}" class="seeMoreLink" > ..ver m&aacute;s </a></small>
                                                        </div>                                                        
                                                        <div class="w-100 d-flex justify-content-between my-2 " >
                                                            <div class="d-flex align-items-center" >
                                                                <div class="border rounded-circle mr-2" style="width:40px; height:40px;" >
                                                                    @foreach ($imgsAutor as $imgAutor)
                                                                        @if ($imgAutor->imageable_id == $post->user_id)
                                                                            <img src="{{$imgAutor->getImageUrl}}" alt="Imagen del autor" class='w-100 h-100' >
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                                <div class="d-flex flex-column align-items-start justify-content-around" >
                                                                    <span style="font-size:70%; font-weight:bold;" >{{$post->user->name}}</span>
                                                                    <span class="text-muted" style="font-size:80%;" >{{$post->created_at->diffForHumans()}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                           
                                                </div>
                                            </div>                                    
                                        </div>

                                @endif
                            @endforeach
                            {{-- sino encuentra una imagen se le coloca un color de fondo x defecto --}}
                            @if ($imgPortada)

                                        <div class="col-12 col-md-5 col-lg-3 mx-lg-1 my-3" >                                            
                                            <div class="container-fluid h-100 p-0">
                                                <div class="row h-100 p-0  shadow rounded bg-light position-relative PostWithOutImage ">
                                                    <div class="w-100 cap position-absolute d-flex align-items-end " style="bottom:0; height:30px;" >
                                                        <div class="d-flex mb-1" >
                                                            <small class="mx-2" ><a href="" class="text-white" >tag1</a></small>
                                                            <small class="mx-2" ><a href="" class="text-white" >tag2</a></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-column align-items-start justify-content-around">                                                            
                                                        <div>
                                                            <h3><a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" >{{$post->title}}</a></h3>
                                                        </div>
                                                        <div>
                                                            <a href="{{route('post.show', $post)}}" class="text-decoration-none text-dark" ><span class="contenido-post small" >{{$post->summary}}</span></a>
                                                            <small><a href="{{route('post.show', $post)}}" class="seeMoreLink" > ..ver m&aacute;s </a></small>
                                                        </div>                                                        
                                                        <div class="w-100 d-flex justify-content-between my-2 " >
                                                            <div class="d-flex align-items-center" >
                                                                <div class="border rounded-circle mr-2" style="width:40px; height:40px;" >
                                                                    @foreach ($imgsAutor as $imgAutor)
                                                                        @if ($imgAutor->imageable_id == $post->user_id)
                                                                            <img src="{{$imgAutor->getImageUrl}}" alt="Imagen del autor" class='w-100 h-100' >
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                                <div class="d-flex flex-column align-items-start justify-content-around  "  >
                                                                    <span style="font-size:70%; font-weight:bold;" >{{$post->user->name}}</span>
                                                                    <span class="text-muted" style="font-size:80%;" >{{$post->created_at->diffForHumans()}}</span>
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                    </div>                                          
                                                </div>
                                            </div>  
                                        </div>

                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
            

        </div>
    </section>

@endsection

@section('footer')

@endsection
@section('js')
    <script>
        window.addEventListener('load',function(){

            contenidoPost =  document.querySelectorAll('.contenido-post');
            seeMoreLink = document.querySelectorAll('.seeMoreLink');

            for (let i = 0; i < contenidoPost.length; i++) {
                seeMoreLink[0].style.display = 'none';
                content = contenidoPost[i].innerHTML;
                content = content.substr(0,100);

                if(contenidoPost[i].innerHTML.length>100){
                    contenidoPost[i].innerHTML = content ;
                    seeMoreLink[0].style.display = 'inline';
                }else{
                    contenidoPost[i].innerHTML = content;
                }

            }
        });
    </script>

    <script>
        window.addEventListener('load' , ()=>{
            caps = document.querySelectorAll('.cap');
            PostWithOutImage = document.querySelectorAll('.PostWithOutImage');

            for (let i = 0; i < PostWithOutImage.length; i++) { 
                caps[i].style.textIndent = '-9999px'; 
                caps[i].style.transition = 'all 250ms ease';               
                PostWithOutImage[i].addEventListener('mouseover' , function (){
                    caps[i].style.transition = 'all 250ms ease';
                    caps[i].style.background = '-webkit-linear-gradient(top, rgba(235,235,235) , rgba(0,0,0,0.3) )';
                    caps[i].style.background = '-moz-linear-gradient(top, rgba(235,235,235) , rgba(0,0,0,0.3) )';
                    caps[i].style.background = 'linear-gradient(top, rgba(235,235,235) , rgba(0,0,0,0.3) )';
                    caps[i].style.color = 'rgb(255,255,255)';
                    caps[i].style.textIndent = '0';
                });
                PostWithOutImage[i].addEventListener('mouseout' , function (){
                    caps[i].style.transition = 'all 250ms ease';
                    caps[i].style.background = 'transparent';
                    caps[i].style.textIndent = '-9999px';
                });
            };

        });
        
    </script>

@endsection
