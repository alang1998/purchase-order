@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('purchase_order.create') }}" class="btn btn-sm btn-info">Tambah</a>
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
        url: "{{ route('purchase_order') }}",
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
    })

    $(document).on('click', '.delete', function(e){
      var id = $(this).data('id');
      var url = "{{ route('purchase_order.delete') }}";

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        console.log(result)
        if (result.value) {
          $.ajax({
            url: url,
            type: 'POST',
            data: {
              "id" : id,
              "_method" : 'DELETE',
              "_token" : "{{ csrf_token() }}"
            },
            success:function(data){              
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              ).then((res) => {
                if (res.value) {
                  $('.tablePurchaseOrder').DataTable().ajax.reload()
                }
              })
            } 
          })
        }
      })
    })
  </script>
@endpush