    <header class="container-fluid" >
        <!-- menu de navegacion -->
        <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top " >

            <a href="{{route('home')}}"  class="navbar-brand" >Bloggers</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu_collapse" style="outline:0;"  >
                <span class="navbar-toggler-icon" ></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="menu_collapse" >

                <ul class="navbar-nav align-items-center" >
                    <li class="nav-item" ><a href="{{route('post.create')}}" class="nav-link">Crear Post</a></li>
                    <li class="nav-item" ><a href="{{route('post.index')}}" class="nav-link">Ver mis Posts</a></li>
                    <li class="nav-item dropdown center flex-column" ><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" ><span class="rounded-circle" style="width: 37px; height:37px;" ><img src="{{asset('images/img-perfil-default.png')}}" class="rounded-circle" style="width: 37px; height:37px;" alt=""></span></a>                                                                                                                      

                        <div class="dropdown-menu " >
                            <a href="#" class="dropdown-item"  >Profile</a>
                            <a href="#" class="dropdown-item"  >Account</a>
                            <a href="#" class="dropdown-item border-top"  >Logout</a>
                        </div>

                    </li>

                    <form action="buscar.php" method="post" class="form-inline "   >
                        <input type="search" placeholder="Buscar" class="form-control mr-sm-2 badge-pill"  >
                        <button type="submit" class="btn btn-dark mt-2 mt-lg-0 badge-pill" >Buscar</button>
                    </form>

                </ul>

            </div>
        </nav>
        <!-- fin menu de navegacion -->
    </header>
