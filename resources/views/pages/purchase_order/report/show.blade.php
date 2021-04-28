@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="#" class="btn btn-sm btn-primary btnReceipt"><i class="fa fa-clipboard"></i> Terima Barang</a>
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
                        <td>0</td>
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
                  <li>
                    <i class="fa fa-plus activity-icon"></i>
                    <p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
                  </li>
                  <li>
                    <i class="fa fa-plus activity-icon"></i>
                    <p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
                  </li>
                  <li>
                    <i class="fa fa-plus activity-icon"></i>
                    <p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
                  </li>
                  <li>
                    <i class="fa fa-check activity-icon"></i>
                    <p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
                  </li>
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
              <div class="col-md-6">
                <label for="namaBarang">Nama Barang</label>
              </div>
              <div class="col-md-3">
                <label for="orderQuantity">Jumlah Order</label>
              </div>
              <div class="col-md-3">
                <label for="orderQuantity">Datang</label>
              </div>
            </div>
            <div class="row">
              @foreach ($purchase_order->detail_orders as $detail_order)
              <div class="col-md-6 mb-2">
                  <input type="hidden" name="detail_id[]" value="{{ $detail_order->id }}">
                  <input type="text" name="item" id="item" class="form-control" disabled value="{{ $detail_order->item->name }}">
                </div>
                <div class="col-md-3 mb-2">
                  <input type="number" name="quantityOrder" id="item" class="form-control" disabled value="{{ $detail_order->quantity }}">
                  <input type="hidden" name="quantity[]" value="{{ $detail_order->quantity }}">
                </div>
                <div class="col-md-3 mb-2">
                  <input type="number" min="0" max="{{ anyHelper::getMaxReceiptOrder($detail_order) }}" name="quantityReceipt[]" id="item" class="form-control">
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
    $(document).ready((e) => {
      $('#modalGoodsReceipt').modal('show');
    });

    $('.btnReceipt').on('click', function (e) {
      $('#modalGoodsReceipt').modal('show');
      e.preventDefault();
    })
  </script>
@endpush