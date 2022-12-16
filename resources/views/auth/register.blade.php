@extends('layouts.depan')
@section('content')
    <!-- Register page -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    
                                    {{-- <img src="{{ asset('images/test.png') }}" height="50" alt="logo" class="auth-logo logo logo-admin"> --}}
                                    
                                    <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Daily Activity</h4>   
                                    <p class="text-muted  mb-0">Silahkan login atau Register</p>  
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav-border nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-semibold" href="{{ route('login') }}">Log In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active font-weight-semibold" href="{{ route('register') }}">Register</a>
                                    </li>
                                </ul>
                                 <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3">                                        
                                        <form class="form-horizontal auth-form" action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <label for="username">Daftar Sebagai</label>
                                                <select id="role" name="role" class="select2bs4 form-control @error('role') is-invalid @enderror" autocomplete="role">
                                                    <option value="">Pilih Role</option>
                                                    <option value="Karyawan">Karyawan</option>
                                                    <option value="Siswa">Siswa</option>
                                                </select>
                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                {{-- @error('name')
                                                    <div class="alert alert-danger border-0 mt-2" role="alert">
                                                        <strong>Oh snap!</strong> {{$message}}
                                                    </div>
                                                @enderror --}}
                                            </div>
                                            <div class="form-group mb-2" id="noId">
                                            </div>  
                                            {{-- <div class="form-group mb-2">
                                                <label for="username">Nama</label>
                                                <div class="input-group">                                                                                         
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan nama">
                                                </div>

                                                @error('name')
                                                    <div class="alert alert-danger border-0 mt-2" role="alert">
                                                        <strong>Oh snap!</strong> {{$message}}
                                                    </div>
                                                @enderror
                                            </div> --}}

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
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukkan password">

                                                    @error('password')
                                                        <div class="alert alert-danger border-0 mt2" role="alert">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>                               
                                            </div><!--end form-group--> 

                                            <div class="form-group mb-2">
                                                <label for="password-confirm">Masukkan Ulang Password</label>                                            
                                                <div class="input-group">                                  
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="current-password" placeholder="Masukkan ulang password">
                                                </div>                               
                                            </div><!--end form-group-->

                                            {{-- <div class="form-group mb-2">
                                                <label for="password-confirm">Id_card</label>                                            
                                                <div class="input-group">                                  
                                                    <input id="id_card" type="text" class="form-control" name="id_card" required autocomplete="current-password" placeholder="Masukkan ulang password">
                                                </div>                               
                                            </div> --}}
                
                                            {{-- <div class="form-group row my-3">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch switch-success">
                                                        <input type="checkbox" class="custom-control-input form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="custom-control-label text-muted" for="remember">Remember me</label>
                                                        <a class="nav-link font-weight-semibold" href="{{ route('register') }}">Register</a>
                                                    </div>
                                                </div><!--end col--> 
                                            </div><!--end form-group-->  --}}
                
                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Daftar <i class="fas fa-sign-in-alt ml-1"></i></button>
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
@section('script')

<script>
    $(document).ready(function(){
        $('#role').change(function(){
            var kel = $('#role option:selected').val();
            if (kel == "Karyawan") {
              $("#noId").addClass("mb-3");
              $("#noId").html(`
              <label for="password-confirm">Kartu ID</label>
                <input id="nomor" type="text" maxlength="5" onkeypress="return inputAngka(event)" placeholder="No Id Card" class="form-control @error('nomor') is-invalid @enderror" name="nomor" autocomplete="nomor">
                <div class="input-group-append">
                    <div class="input-group">                                  
                    </div>
                </div>
                `);
              $("#pesan").html(`
                @error('nomor')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              `);
            } else if(kel == "Siswa") {
              $("#noId").addClass("mb-3");
              $("#noId").html(`
              <label for="password-confirm">Nomor Induk Siswa</label>
                <input id="nomor" type="text" placeholder="No Induk Siswa" class="form-control" name="nomor" autocomplete="nomor">
                <div class="input-group-append">
                    <div class="input-group">                                  
                    </div>
                </div>
              `);
              $("#pesan").html(`
                @error('nomor')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              `);
            } else {
              $('#noId').removeClass("mb-3");
              $('#noId').html('');
            }
        });
    });
    function inputAngka(e) {
      var charCode = (e.which) ? e.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
      }
      return true;
    }
  </script>
@error('id_card')
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Maaf Anda tidak terdaftar sebagai Karyawan!',
        })
</script>  
@enderror 
@error('no_induk')
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Maaf Kamu tidak terdaftar sebagai Siswa!',
        })
</script>  
@enderror 
@endsection