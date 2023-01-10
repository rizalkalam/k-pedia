<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/all') ? 'active' : '' }}" href="/dashboard/all">
            <span data-feather="file-text" class="align-text-bottom"></span>
            All K-Pop Member
          </a>
          <a class="nav-link {{ Request::is('dashboard/girl') ? 'active' : '' }}" href="/dashboard/girl">
            <span data-feather="file-text" class="align-text-bottom"></span>
            K-pop Groups
          </a>
        </li>
      </ul>
    </div>
  </nav>