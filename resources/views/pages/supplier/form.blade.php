@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('supplier') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
        </div>
        <div class="card-body">
          <form action="{{ route($action, $supplier) }}" method="POST">
            @csrf
            @if ($supplier->id)
              @method('put')
            @endif
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kode Supplier</label>
              <div class="col-sm-9">
                <input type="text" name="supplier_code" class="form-control" id="supplierCode" placeholder="" autocomplete="off" value="{{ old('supplier_code') ?? $supplier->supplier_code }}" required>
                @error('supplier_code')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="supplierName" placeholder="" autocomplete="off" value="{{ old('name') ?? $supplier->name }}" required>
                @error('name')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Wilayah</label>
              <div class="col-sm-9">
                <select name="region" class="select-basic form-control" id="supplierRegion">
                  @if ($supplier->id)
                    @foreach ($regions as $region)
                      <option value="{{ $region->id }}" {{ $supplier->region_id == $region->id ? 'selected' : '' }}>{{ $region->region_code.' - '.$region->name }}</option>
                    @endforeach
                  @endif
                </select>
                @error('region')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea name="address" id="supplierAddress" cols="30" rows="5" class="form-control">{{ old('address') ?? $supplier->address }}</textarea>
                @error('name')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Telepon</label>
              <div class="col-sm-9">
                <input type="text" name="phone" class="form-control" id="supplierPhone" placeholder="" autocomplete="off" value="{{ old('phone') ?? $supplier->phone }}" required>
                @error('phone')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" name="email" class="form-control" id="supplierEmail" placeholder="" autocomplete="off" value="{{ old('email') ?? $supplier->email }}" required>
                @error('email')
                  <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Penanggung Jawab</label>
              <div class="col-sm-9">
                <input type="text" name="person_in_charge" class="form-control" id="supplierPic" placeholder="" autocomplete="off" value="{{ old('person_in_charge') ?? $supplier->person_in_charge }}" required>
                @error('phone')
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

@push('scripts')
  <script>    
    $('#supplierRegion').select2({
      placeholder: 'Pilih wilayah',
      allowClear: true,
      ajax: {
        type: 'GET',
        url: '{{ route("api.getRegion") }}',
        dataType: 'json',
        delay: 250,
        processResults: function(data){
          return {
            results: $.map(data, function(item){
              console.log(item);
              return {
                text: item.region_code+' - '+item.name,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    });
  </script>
@endpush