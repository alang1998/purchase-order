<!doctype html>
<html lang="en">
<head>
  <title>{{ config('app.name', 'Laravel') }} - {{ $title ?? 'No Title' }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- jQuery UI required by datepicker editable -->
  <link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- JQVMap css -->
  {{-- <link href="assets/plugins/jqvmap/jqvmap.min.css" rel="stylesheet" type="text/css" /> --}}

  <!-- Bootstrap Tour css -->
  <link href="{{ asset('assets/plugins/bootstrap-tour/bootstrap-tour-standalone.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="{{ asset('assets/css/bootstrap-custom.min.cs') }}s" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

  <style>
    .bg-login {
      padding-top: 0;
      padding-bottom: 0;
      background: #0bc3c3;
      background: -webkit-gradient(linear,left top,right top,from(#0bc3c3),to(#009cff));
      background: linear-gradient(to right,#0bc3c3 0,#009cff 100%);
    }
  </style>

</head>
<body>
  <!-- WRAPPER -->
  <div id="wrapper">

    <!-- MAIN -->
    <div id="app">
      <div class="container">        
        <div class="row vh-100 justify-content-center align-items-center">
          <div class="col-md-8">
            <div class="card-group">
              <div class="card p-4">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-muted">Masuk ke akun anda.</p>
                  @include('layouts.alert')
                  <form method="POST" action="{{ route('login.post') }}">
                      @csrf
                      <div class="input-group mb-3">
                        <div class="input-group">
                          <input type="text" name="username" class="form-control" id="username2" placeholder="Username" autofocus value="{{ old('username') }}">
                          <span class="input-group-append">
                            <span class="input-group-text">
                              <i class="fa fa-user"></i>
                            </span>
                          </span>
                        </div>
                        @error('username')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="input-group mb-4">
                        <div class="input-group">
                          <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                          <span class="input-group-append">
                            <span class="input-group-text">
                              <i class="fa fa-lock"></i>
                            </span>
                          </span>
                        </div>
                        @error('password')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="row">
                      <div class="col-6">
                          <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                      </div>
                      </form>
                      </div>
                </div>
              </div>
              <div class="card text-white bg-login py-5 d-md-none d-lg-block" style="width:44%">
                <div class="card-body text-center">
                  <div>
                    <h2>Purchase Order</h2>
                    <p>PT. CITRA WARNA JAYA ABADI</p>
                    <img src="{{ asset('assets/images/logo/logo-min.png') }}" alt="logo" width="50%">
                    @if (Route::has('password.request'))
                      <a href="{{ route('register') }}" class="btn btn-primary active mt-3">{{ __('Register') }}</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- END MAIN -->
    
    <!-- footer -->
    {{-- @include('layouts.footer') --}}
    <!-- end footer -->

  </div>
  <!-- END WRAPPER -->

  <!-- Vendor -->
  <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

  <!-- Plugins -->
  <script src="{{ asset('assets/plugins/jquery-jeditable/jquery.jeditable.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-jeditable/jquery.jeditable.masked.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script> <!-- required by datepicker plugin -->
  <script src="{{ asset('assets/plugins/jquery-jeditable/jquery.jeditable.datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/justgage/raphael.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/justgage/justgage.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables.net/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables.net-bs4/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.appear/jquery.appear.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-tour/bootstrap-tour-standalone.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>

  <!-- Init -->

  <!-- App -->
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  @stack('scripts')
</body>
</html>