    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">The Aulab Post</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
              </li>
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}"> Registrati </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}"> Login </a>
              </li>
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Benvenuto {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item">
                    <a class="nav-link" href="{{route('article.create')}}"> Inserisci un articolo </a>
                  </li>
                  <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                  <form action="{{route('logout')}}" id="form-logout" class="d-none" method="POST">
                    @csrf
                  </form>                 
              </ul>
              </li>
              @endguest



            </ul>

            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>