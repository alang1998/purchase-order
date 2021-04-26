@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('purchase_order') }}" class="btn btn-sm btn-info">Kembali</a>
          <a href="" class="btn btn-sm btn-primary">Print</a>
          <a href="{{ route('purchase_order.edit', $purchase_order) }}" class="btn btn-sm btn-warning">Edit</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Nomor Order
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $purchase_order->order_number }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Tanggal Order
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ simpleDate($purchase_order->order_date) }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Dibuat oleh
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $purchase_order->user->name }}
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
              {!! order_status($purchase_order->status) !!}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h6 class="text-center">
                    Supplier
                  </h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
                      Nama
                    </div>
                    <div class="d-none d-md-block">
                      :
                    </div>
                    <div class="col-md-8">
                      {{ $purchase_order->supplier->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
                      Alamat
                    </div>
                    <div class="d-none d-md-block">
                      :
                    </div>
                    <div class="col-md-8">
                      {{ $purchase_order->supplier->address }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
                      Telepon
                    </div>
                    <div class="d-none d-md-block">
                      :
                    </div>
                    <div class="col-md-8">
                      {{ $purchase_order->supplier->phone }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
                      PIC
                    </div>
                    <div class="d-none d-md-block">
                      :
                    </div>
                    <div class="col-md-8">
                      {{ $purchase_order->supplier->person_in_charge }}
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h6 class="text-center">
                    Alamat Pengiriman
                  </h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
                      Nama
                    </div>
                    <div class="d-none d-md-block">
                      :
                    </div>
                    <div class="col-md-8">
                      {{ $purchase_order->store->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
                      Alamat
                    </div>
                    <div class="d-none d-md-block">
                      :
                    </div>
                    <div class="col-md-8">
                      {{ $purchase_order->store->address }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
                      Telepon
                    </div>
                    <div class="d-none d-md-block">
                      :
                    </div>
                    <div class="col-md-8">
                      {{ $purchase_order->store->phone }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-3 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
                      PIC
                    </div>
                    <div class="d-none d-md-block">
                      :
                    </div>
                    <div class="col-md-8">
                      {{ $purchase_order->store->person_in_charge }}
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <h6>Catatan :</h6>
              <div class="card">
                <div class="card-body">
                  {{ $purchase_order->note ?? '-' }}
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <h6 class="col-md-12">Order Barang :</h6>
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="datatable-basic" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Kemasan</th>
                      <th>Berat (kg)</th>
                      <th>Harga</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $grandTotal = 0;  
                      $totalTonase = 0;
                    ?>
                    @foreach ($purchase_order->detail_orders as $detail_order)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail_order->item->item_code }}</td>
                        <td>{{ $detail_order->item->name }}</td>
                        <td class="text-right">{{ $detail_order->quantity }}</td>
                        <td>{{ $detail_order->item->unit->name }}</td>
                        <td class="text-right">{{ $detail_order->item->weight }}</td>
                        <td>{{ 'Rp. '.number_format($detail_order->price, '0', '', '.') }}</td>
                        <td>{{ 'Rp. '.number_format($detail_order->quantity * $detail_order->price, '0', '', '.') }}</td>
                      </tr>
                      <?php 
                        $grandTotal += $detail_order->quantity * $detail_order->price;
                        $totalTonase += $detail_order->quantity * $detail_order->item->weight;
                      ?>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="7">Grand Total</th>
                      <th>{{ 'Rp. '.number_format($grandTotal, '0', '', '.') }}</th>
                    </tr>
                    <tr>
                      <th>
                        Terbilang
                      </th>
                      <th colspan="7">{{ ucwords(beCalculated($grandTotal).' rupiah') }}</th>
                    </tr>
                    <tr>
                      <th colspan="7">Total Tonase</th>
                      <th>{{ number_format($totalTonase, '0', '', '.').' kg' }}</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
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