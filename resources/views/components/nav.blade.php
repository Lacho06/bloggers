    <header class="container-fluid" >
        <!-- menu de navegacion -->
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top " >

            <a href="{{route('home')}}"  class="navbar-brand" >Bloggers</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu_collapse" style="outline:0;"  >
                <span class="navbar-toggler-icon" ></span>
            </button>

            <div class="collapse navbar-collapse d-md-flex justify-content-end" id="menu_collapse" >

                <ul class="navbar-nav align-items-center" >
                    @if (auth()->user())

                        <li class="nav-item" ><a href="{{route('post.create')}}" class="nav-link">Crear Post</a></li>
                        <li class="nav-item" ><a href="{{route('post.index')}}" class="nav-link">Ver mis Posts</a></li>
                        <li class="nav-item dropdown" >
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" >
                                <span class="rounded-circle" style="width: 37px; height:37px;">
                                    @php
                                        $img = session('img');
                                    @endphp
                                    <img @if (auth()->user())
                                        //TODO: quitar el condicional de $img != 'storage/posts/'
                                        @if ($img!=null && $img != 'storage/posts/')
                                            src="{{asset($img)}}"
                                        @else
                                            src="{{asset('images/img-perfil-default.png')}}"
                                        @endif
                                    @else
                                        src="{{asset('images/img-perfil-default.png')}}"
                                    @endif class="rounded-circle" style="width: 37px; height:37px;" alt="">
                                </span>
                                @if (auth()->user())
                                    {{auth()->user()->name}}
                                @endif
                            </a>
                            <div class="dropdown-menu " >
                                <a href="#" class="dropdown-item"  >Profile</a>
                                <a href="#" class="dropdown-item"  >Account</a>
                                <a href="{{route('login.destroy')}}" class="dropdown-item border-top"  >Logout</a>
                            </div>

                        </li>
                    @else

                        <li class="nav-item" ><a href="{{route('login.create')}}" class="nav-link">Login</a></li>
                        <li class="nav-item" ><a href="{{route('register.create')}}" class="nav-link">Register</a></li>

                    @endif


                    <form action="{{route('post.search')}}" method="post" class="form-inline">
                        @csrf
                        <input type="search" placeholder="Buscar" name="search" class="form-control mr-sm-2 badge-pill">
                        <button type="submit" class="mt-2 btn btn-dark mt-md-0 badge-pill">Buscar</button>
                    </form>

                </ul>

            </div>
        </nav>
        <!-- fin menu de navegacion -->
    </header>
