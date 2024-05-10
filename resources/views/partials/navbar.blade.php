<<<<<<< HEAD
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
        <div class="col-md-2 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <b class="ikon">BentoKopi</b>
            </a>
        </div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item hoverG"> <a class ="{{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a></li>
            <li class="nav-item hoverG"> <a class="{{ Request::is('menu') ? 'active' : '' }}" href="{{route('allmenu')}}">Menu</a></li>
            <li class="nav-item hoverG"> <a class="{{ ($title === "Reservasi") ? 'active' : '' }}" href="reservasi">Reservasi</a></li>
            <li class="nav-item hoverG"> <a class="{{ ($title === "Kolaborasi") ? 'active' : '' }}" href="{{ route('kolaborasi.index') }}">Kolaborasi</a></li>
            <li class="nav-item hoverG"> <a class="{{ ($title === "Artikel") ? 'active' : '' }}" href="artikel">Artikel</a></li>
            <li class="nav-item hoverG"> <a class="{{ ($title === "Location") ? 'active' : '' }}" href="location">Location</a></li>
            <li class="nav-item hoverG"> <a class="{{ ($title === "Apply") ? 'active' : '' }}" href="{{ route('lowongan.index') }}">Apply</a></li>
            <li class="nav-item hoverG"> <a class="{{ ($title === "About") ? 'active' : '' }}" href="about">About us</a></li>
        </ul>

        <div class="col-md-2 text-end">
            <li class="cart">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
            </li>
            <li> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
            </li>
            <ul class="nav navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back, {{ auth()->user()->username }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard">My dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item"><a>Logout</a></button>
                    </form>
                </ul>
              </li>
                @else
                <li class="nav-item hoverG">
                  <a href="/login" class="nav-link {{ ( $title === "Login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i>
                    Login</a>
                </li>
                @endauth
              </ul>
            
        </div>
        <div class="line"></div>
=======
<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
    <div class="col-md-2 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <b class="ikon">BentoKopi</b>
        </a>
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="hoverG"> <a class="<?php echo $title == 'Beranda' ? 'active' : ''; ?>" href="/">Beranda</a></li>
        <li class="hoverG"> <a class="<?php echo $title == 'Menu' ? 'active' : ''; ?>" href="menu">Menu</a></li>
        <li class="hoverG"> <a class="<?php echo $title == 'Reservasi' ? 'active' : ''; ?>" href="reservasi">Reservasi</a></li>
        <li class="hoverG"> <a class="<?php echo $title == 'Kolaborasi' ? 'active' : ''; ?>" href="{{ route('kolaborasi.index') }}">Kolaborasi</a></li>
        <li class="hoverG"> <a class="<?php echo $title == 'Artikel' ? 'active' : ''; ?>" href="artikel">Artikel</a></li>
        <li class="hoverG"> <a class="<?php echo $title == 'Location' ? 'active' : ''; ?>" href="location">Location</a></li>
        <li class="hoverG"> <a class="<?php echo $title == 'Apply' ? 'active' : ''; ?>" href="{{ route('lowongan.index') }}">Apply</a></li>
        <li class="hoverG"> <a class="<?php echo $title == 'About' ? 'active' : ''; ?>" href="about">About us</a></li>
    </ul>

    <div class="col-md-2 text-end">
        <ul class="nav">
            <li class="cart">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-cart" viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
            </li>
            <li class="user"> Reyhan</li>
        </ul>
    </div>
    <div class="line"></div>
</div>
