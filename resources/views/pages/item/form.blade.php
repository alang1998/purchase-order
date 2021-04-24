@extends('app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('item') }}" class="btn btn-sm btn-info">Kembali</a>
          </div>
          <div class="card-body">
            <form action="{{ route($action, $item) }}" method="POST">
              @csrf
              @if ($item->id)
                @method('put')
              @endif
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Merk</label>
                <div class="col-sm-9">
                  <select name="brand_id" id="itemBrand" class="form-control">
                    @if ($item->id)
                      @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $item->id ? ($brand->id == $item->brand_id ? 'selected' : '' ) : '' }}>{{ $brand->brand_code.' - '.$brand->name }}</option>
                      @endforeach  
                    @else
                      <option value=""></option>
                      @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->brand_code.' - '.$brand->name }}</option>
                      @endforeach
                    @endif
                  </select>
                  @error('brand_id')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kode</label>
                <div class="col-sm-9">
                  <input type="text" name="item_code" class="form-control" id="itemCode" placeholder="" autocomplete="off" value="{{ old('item_code') ?? $item->item_code }}" required>
                  @error('item_code')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="itemName" placeholder="" autocomplete="off" value="{{ old('name') ?? $item->name }}" required>
                  @error('name')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kemasan</label>
                <div class="col-sm-9">
                  <select name="unit_id" id="itemUnit" class="form-control">
                    @if ($item->id)
                      @foreach ($units as $unit)
                        <option value="{{ $unit->id }}" {{ $item->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                      @endforeach
                    @else
                      <option value=""></option>
                      @foreach ($units as $unit)
                        <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                      @endforeach
                    @endif
                  </select>
                  @error('unit_id')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Berat</label>
                <div class="col-sm-9">
                  <input type="number" name="weight" id="itemWeight" class="form-control" min="1" value="{{ old('weight') ?? $item->weight }}">
                  @error('weight')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="float-right">
                <button class="btn btn-primary"><i class="ti-save"></i> &nbsp;{{ $submitButton }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>        
    $('#itemBrand').select2({
      allowClear: true,
      ajax: {
        type: 'GET',
        url: '{{ route("api.getBrand") }}',
        dataType: 'json',
        delay: 250,
        processResults: function(data){
          return {
            results: $.map(data, function(item){
              console.log(item);
              return {
                text: item.brand_code+' - '+item.name,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    });     
    $('#itemUnit').select2({
      allowClear: true,
      ajax: {
        type: 'GET',
        url: '{{ route("api.getUnit") }}',
        dataType: 'json',
        delay: 250,
        processResults: function(data){
          return {
            results: $.map(data, function(item){
              return {
                text: item.name,
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