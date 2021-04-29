@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('region') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
        </div>
        <div class="card-body">
          <form action="{{ route($action, $region) }}" method="POST">
            @csrf
            @if ($region->id)
              @method('put')
            @endif
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kode</label>
              <div class="col-sm-9">
                <input type="text" name="region_code" class="form-control" id="kodeWilayah" placeholder="" autocomplete="off" value="{{ old('region_code') ?? $region->region_code }}" required>
                @error('region_code')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror                  
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="regionName" placeholder="" autocomplete="off" value="{{ old('name') ?? $region->name }}" required>
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
@endsection