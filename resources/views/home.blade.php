@extends('template.master')
@section('heading', 'Dashboard')
@section('page')
  <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
    
@endsection
@section('script')
    <script>
      $("#Dashboard").addClass("active");
      $("#liDashboard").addClass("menu-open");
      $("#Home").addClass("active");
    </script>
@endsection
