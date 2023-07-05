<nav class="navbarAdmin navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}">The Aulab Post</a>
      <button class="navbar2 navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" class="bi bi-menu-up" viewBox="0 0 16 16">
          <path d="M7.646 15.854a.5.5 0 0 0 .708 0L10.207 14H14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3.793l1.853 1.854zM1 9V6h14v3H1zm14 1v2a1 1 0 0 1-1 1h-3.793a1 1 0 0 0-.707.293l-1.5 1.5-1.5-1.5A1 1 0 0 0 5.793 13H2a1 1 0 0 1-1-1v-2h14zm0-5H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v2zM2 11.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 0-1h-8a.5.5 0 0 0-.5.5zm0-4a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11a.5.5 0 0 0-.5.5zm0-4a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1h-6a.5.5 0 0 0-.5.5z"/>
        </svg>
       </button> 
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-black" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorie
            </a>
            <ul class="dropdown-menu">
              @foreach($categories as $category)
              <li>
                <a class="dropdown-item small text-black fst-italic" href="{{route('article.byCategory', ['category' => $category->id])}}"> {{$category->name}} </a>
              </li>
              @endforeach
            </ul>
          </li>

          @guest
          <li class="nav-item">
            <a class="nav-link text-black" href="{{route('register')}}"> Registrati </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black" href="{{route('login')}}"> Login </a>
          </li>

          @else
          
          <li class="nav-item">
            <a class="nav-link text-black" href="{{route('user.profile')}}"> Il mio Profilo </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black" href="{{route('careers')}}"> Lavora con noi </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">

              @if (Auth::user()->is_admin)
              <li>
                <a class="dropdown-item" href="{{route('admin.dashboard')}}"> Dashboard Amministratore </a>
              </li>
              @endif

              @if (Auth::user()->is_revisor)
               <li>
                 <a class="dropdown-item" href="{{route('revisor.dashboard')}}"> Dashboard Revisore </a>
               </li>
              @endif

              @if (Auth::user()->is_writer)
              <li>
                <a class="dropdown-item" href="{{route('writer.dashboard')}}"> Dashboard Redattore </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('article.create')}}"> Inserisci un articolo </a>
              </li>
              @endif

              <li>
                <a class="dropdown-item" href="{{route('article.index')}}"> Lista degli articoli </a>
              </li>
              <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
              <form action="{{route('logout')}}" id="form-logout" class="d-none" method="POST">
                @csrf
              </form>                 
          </ul>
          </li>
          @endguest



        </ul>

        <form method="GET" action="{{route('article.search')}}" class="d-flex" role="search">
          <input class="form-control me-2" name="query" type="search" placeholder="Cerca..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit"> Cerca </button>
        </form>
      </div>
    </div>
  </nav>