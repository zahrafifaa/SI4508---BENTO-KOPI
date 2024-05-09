<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" style="height:95vh;">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 poppins px-40 fw-normal {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 poppins px-40 fw-normal {{ Request::is('dashboard/kolaborator') ? 'active' : ''}}" href="/dashboard/kolaborator">
              <svg class="bi"><use xlink:href="#people"/></svg>
              Kolaborasi
            </a>
          </li>
          <li class="nav-item">
            <div class=''>
              <p></p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>