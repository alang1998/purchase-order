<!doctype html>
<html lang="en">
<head>
  <title>{{ config('app.name', 'Laravel') }} - {{ $title ?? 'No Title' }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  {{-- <!-- jQuery UI required by datepicker editable --> --}}
  <link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />

  {{-- <!-- App css --> --}}
  <link href="{{ asset('assets/css/bootstrap-custom.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/datatables.net-bs4/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

  {{-- <!-- Fonts --> --}}
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

  {{-- <!-- Favicon --> --}}
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
</head>
<body>
  {{-- <!-- WRAPPER --> --}}
  <div id="wrapper">

    {{-- <!-- NAVBAR --> --}}
    @include('layouts.navbar')
    {{-- <!-- END NAVBAR --> --}}

    {{-- <!-- LEFT SIDEBAR --> --}}
    @include('layouts.sidebar')
    {{-- <!-- END LEFT SIDEBAR --> --}}

    {{-- <!-- MAIN --> --}}
    
    <div class="main">

      <div class="main-content">

        @include('layouts.breadcrumb')
        
        <div class="container-fluid">
          
          @include('layouts.alert')

          @yield('content')

        </div>
        
      </div>
      
    </div>
    
    {{-- <!-- END MAIN --> --}}
    
    <div class="clearfix"></div>
    
    {{-- <!-- footer --> --}}
    
    <footer>
      <div class="container-fluid">
        <p class="copyright">&copy; 2020 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
      </div>
    </footer>
    {{-- <!-- end footer --> --}}
    
  </div>
  {{-- <!-- END WRAPPER --> --}}

  @yield('modal')
  
  {{-- <!-- Vendor --> --}}
  <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

  {{-- <!-- Plugins --> --}}
  <script src="{{ asset('assets/plugins/jquery-jeditable/jquery.jeditable.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-jeditable/jquery.jeditable.masked.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script> 
  <script src="{{ asset('assets/plugins/jquery-jeditable/jquery.jeditable.datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/justgage/raphael.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables.net/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables.net-bs4/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.appear/jquery.appear.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>

  {{-- <!-- Init --> --}}
  {{-- <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script> --}}
  {{-- <script src="assets/js/pages/ui-dragdroppanel.init.min.js"></script> --}}

  {{-- <!-- App --> --}}
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  @stack('scripts')
</body>
</html>