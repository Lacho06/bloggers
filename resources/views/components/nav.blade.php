    <header class="container-fluid" >
        <!-- menu de navegacion -->
        <nav class="navbar navbar-expand-md bg-light  navbar-light fixed-top " >

            <a href="{{route('home')}}"  class="navbar-brand" >Bloggers</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu_collapse" style="outline:0;"  >
                <span class="navbar-toggler-icon" ></span>
            </button>

            <div class="collapse navbar-collapse d-md-flex justify-content-end" id="menu_collapse" >

                <ul class="navbar-nav" >
                    <li class="nav-item" ><a href="{{route('post.create')}}" class="nav-link">Crear Post</a></li>
                    <li class="nav-item" ><a href="{{route('post.index')}}" class="nav-link">Ver mis Posts</a></li>
                    <li class="nav-item dropdown" ><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"    >Link 4</a>

                        <div class="dropdown-menu " >
                            <a href="#" class="dropdown-item"  >Sublink 1</a>
                            <a href="#" class="dropdown-item"  >Sublink 2</a>
                            <a href="#" class="dropdown-item"  >Sublink 3</a>
                        </div>

                    </li>

                    <form action="buscar.php" method="post" class="form-inline "   >
                        <input type="search" placeholder="Buscar" class="form-control mr-sm-2 badge-pill"  >
                        <button type="submit" class="btn btn-dark mt-2 mt-md-0 badge-pill" >Buscar</button>
                    </form>

                </ul>

            </div>
        </nav>
        <!-- fin menu de navegacion -->
    </header>
