<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item" id="liDashboard">
          <a href="#" class="nav-link" id="Dashboard">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Karyawan')
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link" id="Home">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
            @endif
            @if (Auth::user()->role == 'Admin')
            <li class="nav-item">
              <a href="{{ url('/admin/dashboard') }}" class="nav-link" id="AdminHome">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard Admin</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @if (Auth::user()->role == 'Admin')
        <li class="nav-item" id="liMasterData">
          <a href="#" class="nav-link" id="MasterData">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Master Data
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('/karyawan') }}" class="nav-link" id="DataKaryawan">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Karyawan</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        @if (Auth::user()->role == 'Karyawan')
        <li class="nav-header">EXAMPLES</li>
          <li class="nav-item" id="liAktivitas">
            <a href="{{ route('activity-index') }}" class="nav-link" id="Aktivitas">
              <i class="nav-icon fas fa-book"></i>
              <p>Aktivitas</p>
            </a>
          </li>
          <li class="nav-item" id="liKegiatan">
            <a href="{{ url('/kegiatan') }}" class="nav-link" id="Kegiatan">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>Kegiatan</p>
            </a>
          </li>
        @endif
      </ul>
    </nav>
  </div>
</aside>