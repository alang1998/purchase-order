@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('pengguna') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
        </div>
        <div class="card-body">
          <form action="{{ route($action, $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($user->id)
              @method('put')
            @endif
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="userName" placeholder="" autocomplete="off" value="{{ old('name') ?? $user->name }}" required>
                @error('name')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" name="username" class="form-control" id="userUsername" placeholder="" autocomplete="off" value="{{ old('username') ?? $user->username }}" required>
                @error('username')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            {{-- <div class="form-group row">
              <label class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="userPassword" placeholder="" autocomplete="off" value="{{ old('password') ?? $user->password }}" required>
                @error('password')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div> --}}              
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Wewenang</label>
              <div class="col-sm-9">
                <select name="role_id" id="userRole" class="form-control">
                  <option value="">== Pilih ==</option>
                  @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') ? 'selected' : ($user->role_id == $role->id ? 'selected' : '') }}>{{ $role->name }}</option>
                  @endforeach
                </select>
                @error('role_id')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanda Tangan Digital</label>
              <div class="col-sm-9">
                <input type="file" name="signature" class="form-control-file" id="userSignature">
                @if ($user->id)
                  <input type="hidden" name="oldSignature" id="userOldSignature" class="form-control" value="{{ $user->signature }}">
                  <span class="text-danger">* Tidak perlu input gambar jika tidak ingin mengubah TTD</span>
                @endif
                @error('signature')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="float-right">
              <button class="btn btn-primary"><i class="fa fa-save"></i> &nbsp;{{ $submitButton }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection