<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Notes App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="/">Home</a>
                <a class="nav-link" aria-current="page" href="/notes">Notes</a>

                @auth 
                <li class="nav-item dropdown ms-auto">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome, {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                         <button type="submit" class="dropdown-item">Logout</button>   
                        </form>
                    </li>
                </ul>
                </li>
                @else
                <a class="nav-link ms-auto" href="/login">Login</a>
                @endauth
            </div>
            </div>
        </div>
        </nav>