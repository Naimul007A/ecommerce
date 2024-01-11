<div class="sticky-top">
    <header class="pb-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container">
                <a class="navbar-brand" href="{{route ("home")}}">SHOP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link @if (Request::is('/')) active @endif" aria-current="page"
                               href="{{route ('home')}}">Home</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link @if (Request::is('profile')) active @endif" href="{{route
                                ("profile")}}">Profile</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route ("logout")}}">Logout</a>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{route ("login")}}">Login</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">Register</a>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a href="{{route ("show-cart")}}" class="btn btn-info position-relative text-light fw-bold">
                                Cart
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                     @if(session ()->has ("cart"))
                                        {{ count(session('cart')) }}
                                    @else
                                        0
                                    @endif
                                </span>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</div>
