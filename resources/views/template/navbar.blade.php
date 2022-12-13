<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <div class="btn-group" role="group">
            {{-- <a id="btnGroupDrop1" style="color: rgb(0, 0, 0); margin-right: 40px;" type="button" class="dropdown-toggle text-capitalize" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="nav-icon fas fa-user-circle"></i> &nbsp; {{ Auth::user()->name }}
            </a> --}}
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user-circle"></i>
              {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">{{ Auth::user()->name }}</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-user mr-3"></i> Profil
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <i class="fnav-icon fas fa-sign-out-alt mr-3"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </div>
        </div>
    </li>
</ul>
</nav>