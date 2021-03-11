
  {{-- show success message --}}
  @if ($message = session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <i class="fa fa-check-circle"></i> {{ $message }}
    </div>
  @endif
  {{-- show error message --}}
  @if ($message = session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <i class="fa fa-times-circle"></i> {{ $message }}
    </div>
  @endif