<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" style="height:95vh;">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 poppins px-40 {{ Request::is('dashboard') ? 'active' : 'fw-normal'}}" aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>

          <li class="nav-item">
              <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 gap-2 poppins px-40 fs-14 collapsed" data-bs-toggle="collapse" data-bs-target="#menu-collapse" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-menu-up" viewBox="0 0 16 16">
                    <path d="M7.646 15.854a.5.5 0 0 0 .708 0L10.207 14H14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3.793zM1 9V6h14v3zm14 1v2a1 1 0 0 1-1 1h-3.793a1 1 0 0 0-.707.293l-1.5 1.5-1.5-1.5A1 1 0 0 0 5.793 13H2a1 1 0 0 1-1-1v-2zm0-5H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zM2 11.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 0-1h-8a.5.5 0 0 0-.5.5m0-4a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11a.5.5 0 0 0-.5.5m0-4a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1h-6a.5.5 0 0 0-.5.5"/>
                  </svg>
                    Kelola Menu
              </button>
                    <div class="collapse" id="menu-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small gap-3 poppins px-40">
                            <li>
                                <a href="{{ route('admin.menu.makanan') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 my-2 fs-14 {{ Request::is('dashboard/menu-makanan') ? 'active' : ''}}">
                                    Menu Makanan
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.menu.minuman')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 fs-14 {{ Request::is('dashboard/menu-minuman') ? 'active' : ''}}">
                                    Menu Minuman
                                </a>
                            </li>
                            <li> 
                                <a href="{{route('admin.store.menu')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 py-2 fs-14 {{ Request::is('dashboard/tambah-menu') ? 'active' : ''}}">
                                    Tambah Menu
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 gap-2 poppins px-40 fs-14 collapsed" data-bs-toggle="collapse" data-bs-target="#kolaborasi-collapse" aria-expanded="false">
                        <svg class="bi"><use xlink:href="#people"/></svg>
                        Kolaborasi
                    </button>
                    <div class="collapse" id="kolaborasi-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small gap-2 poppins px-40">
                            <li>
                                <a href="/dashboard/kolaborator" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 my-2 fs-14 {{ Request::is('dashboard/kolaborator') ? 'active' : ''}}">
                                    List Kolaborasi
                                </a>
                            </li>
                            <li>
                                <a href="/dashboard/kolaborasi" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 fs-14 {{ Request::is('dashboard/kolaborasi') ? 'active' : ''}}">
                                    List Kolaborator
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
              </ul>
            </div>
          </li>
                <li class="nav-item">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 gap-2 poppins px-40 fs-14 collapsed" data-bs-toggle="collapse" data-bs-target="#lowongan-collapse" aria-expanded="false">
                        <svg class="bi"><use xlink:href="#people"/></svg>
                        Lowongan Kerja
                    </button>
                    <div class="collapse" id="lowongan-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small gap-2 poppins px-40">
                            <li>
                                <a href="/dashboard/kolaborator" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 my-2 fs-14 {{ Request::is('dashboard/kolaborator') ? 'active' : ''}}">
                                    Daftar Lowongan
                                </a>
                            </li>
                            <li>
                                <a href="   {{ route('pelamar.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 fs-14 {{ Request::is('dashboard/pelamar') ? 'active' : ''}}">
                                    Pelamar
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
        </ul>
      </div>
    </div>
  </div>

  