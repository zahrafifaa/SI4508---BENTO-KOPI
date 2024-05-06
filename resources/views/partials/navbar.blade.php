
{{-- Offcanvas
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Pesanan</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    ...
  </div>
</div> --}}

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fs-2 fw-bold" href="/" style="color: #007200;">BentoKopi</a>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse  " id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Beranda") ? 'actives' : '' }}" href="/">Beranda</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Menu") ? 'actives' : '' }}" href="{{route('allmenu')}}">Menu</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Reservasi") ? 'actives' : '' }}" href="reservasi">Reservasi</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Kolaborasi") ? 'actives' : '' }}" href="kolaborasi">Kolaborasi</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Artikel") ? 'actives' : '' }}" href="artikel">Artikel</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Location") ? 'actives' : '' }}" href="location">Location</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Apply") ? 'actives' : '' }}" href="apply">Apply</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "About") ? 'actives' : '' }}" href="about">About us</a></li>
          </ul>

          <ul class="navbar-nav my-4  ">
            
            <li>
              {{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button> --}}
              <a class="nav-link" href="/cart" >
                <i class="m-0 "  data-feather = "shopping-cart">d</i>
              </a>
            </li>
            @if($totalItems > 0)
            <span class="quantity-badge ">{{ $totalItems }}</span>
            @else
            <span class="quantity-badge">0</span>
            @endif
            <li>
              <a class="nav-link" href="/"><i class="m-0 " data-feather = "user"></i></a>
            </li>
            @auth
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Logout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Apakah anda yakin ingin logout?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <form class="btn btn-primary" action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item "><a>Logout</a></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
  
             @if (auth()->user()->username === 'App')
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard">My dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#">Logout</a></li>
              </ul>
             </li>
                 
             @else
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#">Logout</a></li>
              </ul>
             </li>
                 
             @endif
            @else
            <li class="nav-item ">
              <a href="/login" class="nav-link {{ ( $title === "Login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i>
                Login</a>
            </li>
            @endauth
        </ul>
          
        </div>

  </div>
</nav>
<div class="line w-10"></div>