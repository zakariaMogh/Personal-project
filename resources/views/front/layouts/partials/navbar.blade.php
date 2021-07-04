<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Blog task</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{request()->is('home') ? 'active' : ''}}" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{request()->is('contact') ? 'active' : ''}}" href="#!">Contact</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth('user')
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="#">{{auth()->guard('user')->user()->name}}</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('logout')}}">Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('login.index')}}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

