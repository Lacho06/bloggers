    <header class="container-fluid" >
        <!-- menu de navegacion -->
        <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top " >

            <a href="{{route('home')}}"  class="navbar-brand" >Bloggers</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu_collapse" style="outline:0;"  >
                <span class="navbar-toggler-icon" ></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="menu_collapse" >

                <ul class="navbar-nav align-items-center" >
                    @if (auth()->user())
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Posts</a>
                            <div class="dropdown-menu">
                                <a href="{{route('post.create')}}" class="dropdown-item nav-link">Crear Post</a>
                                <a href="{{route('post.index')}}" class="dropdown-item border-top nav-link">Ver mis Posts</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tags</a>
                            <div class="dropdown-menu">
                                <a href="{{route('tag.create')}}" class="dropdown-item">Crear Tag</a>
                                <a href="{{route('tag.userTags')}}" class="dropdown-item border-top">Ver mis Tags</a>
                                <a href="#" class="dropdown-item border-top">Asignar Tag</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
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
                            <div class="dropdown-menu">
                                <a href="{{route('profile')}}" class="dropdown-item">Profile</a>
                                <a href="{{route('login.destroy')}}" class="dropdown-item border-top">Logout</a>
                            </div>

                        </li>
                    @else

                        <li class="nav-item" ><a href="{{route('login.create')}}" class="nav-link">Login</a></li>
                        <li class="nav-item" ><a href="{{route('register.create')}}" class="nav-link">Register</a></li>

                    @endif

                    @if ($search)
                        {{-- @if ($type_search) --}}
                            <form action="{{route('post.search')}}" method="post" class="form-inline">
                                @csrf
                                <input type="search" placeholder="Buscar" name="search" class="form-control mr-sm-2 badge-pill">
                                <button type="submit" class="mt-2 btn btn-dark mt-md-0 badge-pill">Buscar</button>
                            </form>
                        {{-- @endif --}}
                    @endif


                </ul>

            </div>
        </nav>
        <!-- fin menu de navegacion -->
    </header>
