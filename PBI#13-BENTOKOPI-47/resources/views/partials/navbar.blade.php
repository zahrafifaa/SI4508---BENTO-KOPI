<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
    <div class="col-md-2 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <b class="ikon">BentoKopi</b>
        </a>
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
