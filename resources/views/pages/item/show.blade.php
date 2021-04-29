@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('item') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Merk
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $item->brand->brand_code.' - '.$item->brand->name }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Kode
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $item->item_code }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Nama
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $item->name }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Berat (kg)
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $item->weight }}
            </div>
          </div>
          <hr>
          <h4>Daftar Harga Supplier</h4>
          <table class="table table-bordered tableSupplier">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Supplier</th>
                <th>Wilayah</th>
                <th>Harga (Rp)</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($item->suppliers as $supplier)
                <tr>
                  <td>{{ $supplier->supplier_code }}</td>
                  <td>{{ $supplier->name }}</td>
                  <td>{{ $supplier->region->name }}</td>
                  <td class="text-right">{{ number_format($supplier->pivot->price, '0', '', '.') }}</td>
                  <td><a href="{{ route('supplier.show', $supplier) }}" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('.tableSupplier').DataTable();
  </script>
@endpush