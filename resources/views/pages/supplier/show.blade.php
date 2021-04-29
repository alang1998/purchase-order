@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('supplier') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Kode
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $supplier->supplier_code }}
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
              {{ $supplier->name }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Wilayah
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $supplier->region->name }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Alamat
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $supplier->address }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Telepon
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $supplier->phone }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Email
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $supplier->email }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Penanggung Jawab
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $supplier->person_in_charge }}
            </div>
          </div>
          <hr>
          <h4>Daftar Harga Barang</h4>
          <table class="table table-bordered tableBarang">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Merk</th>
                <th>Nama</th>
                <th>Harga (Rp)</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($supplier->items as $item)
                <tr>
                  <td>{{ $item->item_code }}</td>
                  <td>{{ $item->brand->name }}</td>
                  <td>{{ $item->name }}</td>
                  <td class="text-right">{{ number_format($item->pivot->price, '0', '', '.') }}</td>
                  <td><a href="{{ route('item.show', $item) }}" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a></td>
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
    $('.tableBarang').DataTable();
  </script>
@endpush