<header class="wrapper bg-light">
    <nav class="navbar center-nav navbar-expand-lg navbar-light" style="padding: 1rem;">
        <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
                <a href="/">
                    <img class="img-fluid-50" src="{{asset("img/rifasjuniorlogo.png")}}" alt="logo" />
                    {{-- <label for="title" class="dropdown-item">Rifas Junior</label> --}}
                </a>
            </div>
            <div class="navbar-collapse offcanvas-nav">
                <div class="offcanvas-header d-lg-none d-xl-none">
                    <a href="index.html"><img class="img-fluid-50" src="{{asset("img/rifasjuniorlogo.png")}}" alt="logo" /></a>
                    <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close"
                        aria-label="Close"></button>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#preguntas">Preguntas frecuentes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#nosotros">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#contacto">Contacto</a></li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
                    {{-- <li class="nav-item d-none d-md-block">
                        <a href="/aviso/pagos" class="btn btn-green btn-sm btn-success rounded-pill">Pagos</a>
                    </li> --}}
                    <li class="nav-item d-lg-none">
                        <div class="navbar-hamburger"><button class="hamburger animate plain"
                                data-toggle="offcanvas-nav"><span></span></button></div>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
</header>
