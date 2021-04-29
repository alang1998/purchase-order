@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('store') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
        </div>
        <div class="card-body">
          <form action="{{ route($action, $store) }}" method="POST" novalidate>
            @csrf
            @if ($store->id)
              @method('put')
            @endif
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="storeName" placeholder="" autocomplete="off" value="{{ old('name') ?? $store->name }}" autofocus required>
                @error('name')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea name="address" id="storeAddress" cols="30" rows="5" class="form-control">{{ old('address') ?? $store->address }}</textarea>
                @error('address')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Telepon</label>
              <div class="col-sm-9">
                <input type="text" name="phone" class="form-control" id="storePhone" placeholder="" autocomplete="off" value="{{ old('phone') ?? $store->phone }}" required>
                @error('phone')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Penanggung Jawab</label>
              <div class="col-sm-9">
                <input type="text" name="person_in_charge" class="form-control" id="storePic" placeholder="" autocomplete="off" value="{{ old('person_in_charge') ?? $store->person_in_charge }}" required>
                @error('person_in_charge')
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