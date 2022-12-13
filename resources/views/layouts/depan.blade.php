<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Sistem Informasi Sekolah</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="{{ asset('images/TVRI.ico') }}"> --}}

        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" /> --}}
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{asset('js/instascan.js')}}"></script> --}}
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('css/toastr/toastr.min.css') }}">
        <link href="{{asset('plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('plugins/sweet-alert2/sweetalert2.min.js')}}"></script>

        <!-- Toastr -->
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    </head>

    <style>
        /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (max-width: 680px) {
        video {
            width: 100%; max-height: 100%;
        }
    }

    @media only screen and (max-width: 1080px) {
        video {
            width: 100%; max-height: 100%;
        }
    }
    </style>

    <body class="account-body accountbg">

        <!-- Log In page -->
        @yield('content')<!--end container-->
        <!-- End Log In page -->
        
        <!-- jQuery  -->
        <!-- App js -->
        <script src="{{ asset('js/app.js')}}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/feather.min.js') }}"></script>
        <script src="{{ asset('js/simplebar.min.js') }}"></script>

        <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>

        @yield('script')

        {{-- @if (Session::has('success'))
        <script>
            toastr.success("{{ Session('success') }}");
        </script>
        @endif
        @if (Session::has('error'))
            <script>
                toastr.error("{{ Session('error') }}");
            </script>
        @endif --}}
    </body>
</html>

