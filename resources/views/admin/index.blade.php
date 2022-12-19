@extends('template.master')
@section('heading', 'Dashboard')

@section('page')
    <li class="breadcrumb-item active">Admin</li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <a href="{{ url('/karyawan') }}" class="info-box-icon bg-danger elevation-1"><i class="fas fa-solid fa-graduation-cap"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Karyawan</span>
                <span class="info-box-number">{{ $karyawan }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User Registration</span>
                <span class="info-box-number">{{ $user }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
@endsection

@section('script')
      <script>
        $("#Dashboard").addClass("active");
        $("#liDashboard").addClass("menu-open");
        $("#AdminHome").addClass("active");
      </script>
@endsection
