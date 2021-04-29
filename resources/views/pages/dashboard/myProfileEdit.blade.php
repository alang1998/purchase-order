@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-2">Edit Profil</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('dashboard.myProfile.changePassword', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label class="col-sm-3">Nama</label>
              <div class="col-sm-9">
                {{ $user->name }}
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Username</label>
              <div class="col-sm-9">
                {{ $user->username }}
              </div>
            </div>             
            <div class="form-group row">
              <label class="col-sm-3">Wewenang</label>
              <div class="col-sm-9">
                {{ $user->role->name }}
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Tanda Tangan</label>
              <div class="col-sm-9">                
                <img src="{{ asset('storage/signature/'.$user->signature) }}" alt="logo-perusahaan" width="100px" class="">
              </div>
            </div>
            <hr>
            
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Password Lama</label>
              <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="userPassword" placeholder="" autocomplete="off" value="" required>
                @error('password')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Password Baru</label>
              <div class="col-sm-9">
                <div class="passwordStrength">
                  <input type="password" name="newPassword" class="form-control mb-1" id="userNewPassword" placeholder="" autocomplete="off" value="" required>
                </div>
                @error('newPassword')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Verifikasi Password Baru</label>
              <div class="col-sm-9">
                <input type="password" name="verifikasiPassword" class="form-control" id="userVerifikasiPassword" placeholder="" autocomplete="off" value="" required>
                @error('verification')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
                <div class="valid-feedback">
                  Password sudah sesuai.
                </div>
                <div class="invalid-feedback">
                    Password tidak sesuai.
                </div>
              </div>
            </div> 
            <div class="float-right">
              <button class="btn btn-primary btnSave" disabled="disabled"><i class="fa fa-save"></i> &nbsp;{{ $submitButton }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('assets/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/hideshowpassword/hideshowpassword.min.js') }}"></script>
  <script>
  $('#userNewPassword').hideShowPassword({
      innerToggle: true,
      toggle: {
        className: 'hideShowPassword-toggle toggle-eye'
      },
      states: {
        shown: {
          toggle: {
            content: '<i class="fa fa-eye-slash"></i>'
          }
        },
        hidden: {
          toggle: {
            content: '<i class="fa fa-eye"></i>'
          }
        }
      }
  });

  $('#userNewPassword').pwstrength({
    ui: {
      container: '.passwordStrength',
      showVerdictsInsideProgressBar: true,
      viewports: {
        verdict: ".pwstrength_viewport_verdict"
      }
    }
  });

  $(document).ready(function(){
    $("button").css('top', '33%');
    
    $('#userVerifikasiPassword').on('keyup', function() {
      console.log($(this).val());
      var newPass = $('#userNewPassword').val();
      var confirmPass = $('#userVerifikasiPassword').val();            
      if (newPass != confirmPass) {
      $('.btnSave').attr("disabled",'disabled');
      $('#userVerifikasiPassword').addClass('is-invalid');            
      $('#userVerifikasiPassword').removeClass('is-valid');
      }else{              
      $('#userVerifikasiPassword').removeClass('is-invalid');
      $('#userVerifikasiPassword').addClass('is-valid');
      $('.btnSave').removeAttr('disabled');
      }    
    });

  })

  </script>
@endpush