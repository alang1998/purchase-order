@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('purchase_order.verification') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
          @if ($purchase_order->status == 1)
            <a href="{{ route('purchase_order.printOrder', $purchase_order) }}" class="btn btn-sm btn-primary" target="_BLANK">Print</a>            
          @endif
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
          @if ($purchase_order->status > 0)
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Status Verifikasi
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $purchase_order->verification_order->description.' oleh '.$purchase_order->verification_order->user->name }}
            </div>
          </div>
          <hr>              
          @endif
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
  @if ($purchase_order->status == 0 && Auth::user()->role->id < 6)
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="mt-2">Verifikasi Pembelian</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('purchase_order.verification.sendVerification', $purchase_order) }}" method="POST">
              @csrf
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="verifikasiSwitch" name="status" value="1">
                <label class="custom-control-label" for="verifikasiSwitch">{{ Auth::user()->name }} <span class="badge badge-success">{{ Auth::user()->role->name }}</span></label><br>
                <small class="mini-text text-muted">Dengan ini anda menyetujui pembuatan PO tersebut.</small>
              </div>
              <button type="submit" class="btn btn-danger mt-3 btnAccept">Tolak</button>
            </form>
          </div>
        </div> 
      </div>
    </div>    
  @endif
@endsection

@push('scripts')
  <script>
    $('#verifikasiSwitch').on('click', function () {
      if ($(this).is(":checked")) {
        $('.btnAccept').removeClass('btn-danger').addClass('btn-primary').empty().append('Terima');
      } else {
        $('.btnAccept').removeClass('btn-primary').addClass('btn-danger').empty().append('Tolak');
      }
    })
  </script>
@endpush