@extends('app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('role') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
          </div>
          <div class="card-body">
            <form action="{{ route($action, $role) }}" method="POST">
              @csrf
              @if ($role->id)
                @method('put')
              @endif
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="roleName" placeholder="" autocomplete="off" value="{{ old('name') ?? $role->name }}" required>
                  @error('name')
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
  </div>
@endsection