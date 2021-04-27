@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table tablePurchaseOrder" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nomer</th>
                  <th>Tanggal</th>
                  <th>Pembuat</th>
                  <th>Penerima</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('.tablePurchaseOrder').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('purchase_order.verification') }}",
        type: 'GET',
      },
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'order_number', name: 'order_number' },
        { data: 'order_date', name: 'order_date' },
        { data: 'user', name: 'user' },
        { data: 'store', name: 'store' },
        { data: 'total', name: 'total' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action' }
      ]
    });
  </script>
@endpush