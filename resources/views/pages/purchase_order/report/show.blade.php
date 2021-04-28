@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          @if (Auth::user()->role->id > 3 || Auth::user()->role->id == 1)
            <a href="#" class="btn btn-sm btn-primary btnReceipt {{ anyHelper::receiptOrder($purchase_order->detail_orders) ? 'disabled' : '' }}">
              <i class="fa fa-clipboard"></i> Terima Barang
            </a> 
          @else
            <a href="#" class="btn btn-sm btn-primary disabled">
              <i class="fa fa-clipboard"></i> Terima Barang
            </a>          
          @endif
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h5>Daftar Barang</h5>
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
                      <th>Jumlah Datang</th>
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
                        <td>{{ anyHelper::getQuantityReceipt($detail_order) }}</td>
                      </tr>
                      <?php 
                        $grandTotal += $detail_order->quantity * $detail_order->price;
                        $totalTonase += $detail_order->quantity * $detail_order->item->weight;
                      ?>
                    @endforeach
                  </tbody>
                </table>
                <hr>
                <h5>Histori Penerimaan Barang</h5>
                <ul class="list-unstyled activity-timeline">
                  @foreach ($purchase_order->history_reports as $history)
                  <li>
                    <i class="fa fa-plus activity-icon"></i>
                    <p class="font-weight-bold">Barang diterima:</p>
                    <table>
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Jumlah Diterima</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($history->goods_receipt as $receipt)
                        <tr>
                          <td>{{ $receipt->detail_order->item->name }}</td>
                          <td class="text-center">{{ $receipt->quantity }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="2">
                            <span class="timestamp">{{ $history->created_at }} oleh {{ $history->user->name }}</span>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('modal')
  
  {{-- Modal --}}  
  <div class="modal fade" id="modalGoodsReceipt" tabindex="-1" role="dialog" aria-labelledby="modalGoodsReceiptLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalGoodsReceiptLabel">Terima Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('purchase_order.report.receiptGoods', $purchase_order) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <label for="namaBarang">Nama Barang</label>
              </div>
              <div class="col-md-3">
                <label for="orderQuantity">Jumlah Order</label>
              </div>
              <div class="col-md-2">
                <label for="orderQuantity">Diterima</label>
              </div>
              <div class="col-md-3">
                <label for="orderQuantity">Datang</label>
              </div>
            </div>
            <div class="row">
              @foreach ($purchase_order->detail_orders as $key => $detail_order)
                <div class="col-md-4 mb-2">
                  <input type="hidden" name="detail_id[]" value="{{ $detail_order->id }}">
                  <input type="text" name="item" id="item" class="form-control" disabled value="{{ $detail_order->item->item_code }}">
                </div>
                <div class="col-md-3 mb-2">
                  <input type="number" name="quantityOrder" id="item" class="form-control" disabled value="{{ $detail_order->quantity }}">
                  <input type="hidden" name="quantity[]" value="{{ $detail_order->quantity }}">
                </div>                
                <div class="col-md-2 mb-2">
                  <input type="number" name="receiptDone[]" id="receiptDone" class="form-control" readonly value="{{ anyHelper::getQuantityReceipt($detail_order) }}">
                </div>
                <div class="col-md-3 mb-2">
                  <input type="number" min="0" max="{{ anyHelper::getMaxReceiptOrder($detail_order) }}" name="quantityReceipt[]" id="receiptQuantity" class="form-control" value="0" required {{ $detail_order->quantity == anyHelper::getQuantityReceipt($detail_order) ? 'readonly' : '' }}>
                </div>
              @endforeach
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // $(document).ready((e) => {
    //   $('#modalGoodsReceipt').modal('show');
    // });

    $('.btnReceipt').on('click', function (e) {
      $('#modalGoodsReceipt').modal('show');
      e.preventDefault();
    })
  </script>
@endpush