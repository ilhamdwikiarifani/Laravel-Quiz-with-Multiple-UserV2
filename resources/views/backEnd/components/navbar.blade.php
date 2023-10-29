<nav class="navbar navbar-expand-lg py-3">
    <div class="container px-0 ">
        <img src={{ asset('backEnd/image/logo/codeneko-black.png') }} alt="img-logo" width="150px" class="ps-3">
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0 pe-lg-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name
                        }} - <span class="text-primary fw-bold" style="text-transform: uppercase;">{{
                            Auth::user()->role->name }} </span></a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#!">{{ Auth::user()->email }}</a>
                        <div class="dropdown-divider"></div>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>