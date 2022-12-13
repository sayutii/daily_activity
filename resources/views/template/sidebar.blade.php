<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
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
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link" id="Home">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="AdminHome">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard Admin</p>
              </a>
            </li>
          </ul>
        </li>
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
              <a href="{{ url('/karyawan') }}" class="nav-link" id="DataJadwal">
                <i class="far fa-circle nav-icon"></i>
                <p>Data User</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>