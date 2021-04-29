@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-2">Profil</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Nama
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $user->name }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Username
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $user->username }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Wewenang
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $user->role->name }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Status
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {!! user_status($user->status) !!}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Tanda Tangan
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              <img src="{{ asset('storage/signature/'.$user->signature) }}" alt="logo-perusahaan" width="100px" class="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>

  </script>
@endpush