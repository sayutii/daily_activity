@extends('layouts.depan')
@section('content')
    <!-- Log In page -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    
                                    {{-- <img src="{{ asset('images/logotvri.png') }}" height="50" alt="logo" class="auth-logo logo logo-admin"> --}}
                                    
                                    <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Sistem Informasi Sekolah</h4>   
                                    <p class="text-muted  mb-0">Silahkan login atau Register</p>  
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav-border nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-semibold" href="{{ route('register') }}">Register</a>
                                    </li>
                                </ul>
                                 <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">                                        
                                        <form class="form-horizontal auth-form" action="{{ route('login') }}" method="POST">
                                            @csrf
            
                                            <div class="form-group mb-2">
                                                <label for="username">Email address</label>
                                                <div class="input-group">                                                                                         
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email">
                                                </div>          
                                                
                                                @error('email')
                                                    <div class="alert alert-danger border-0 mt-2" role="alert">
                                                        {{-- <strong>Oh snap!</strong> --}} {{$message}}
                                                    </div>
                                                @enderror
                                            </div><!--end form-group--> 
                
                                            <div class="form-group mb-2">
                                                <label for="userpassword">Password</label>                                            
                                                <div class="input-group">                                  
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan password">

                                                    @error('password')
                                                        <div class="alert alert-danger border-0 mt2" role="alert">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>                               
                                            </div><!--end form-group--> 
                
                                            <div class="form-group row my-3">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch switch-success">
                                                        <input type="checkbox" class="custom-control-input form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="custom-control-label text-muted" for="remember">Remember me</label>
                                                        {{-- <a class="nav-link font-weight-semibold" href="{{ route('register') }}">Register</a> --}}
                                                    </div>
                                                </div><!--end col--> 
                                            </div><!--end form-group--> 
                
                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" id="btnresult">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                                </div><!--end col--> 
                                            </div> <!--end form-group-->                           
                                        </form><!--end form-->
                                    </div>
                                    
                                </div>
                            </div><!--end card-body-->
                            <div class="card-body bg-light-alt text-center">
                                <span class="text-muted d-none d-sm-inline-block">&copy; 2022 Muhammad Sayuti</span>                                            
                            </div>
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- End Log In page -->
@endsection