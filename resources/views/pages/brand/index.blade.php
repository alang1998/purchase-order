@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('brand.create') }}" class="btn btn-sm btn-info">Tambah</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table tableBrand" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Nama</th>
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
    $('.tableBrand').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('brand') }}",
        type: 'GET',
      },
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'brand_code', name: 'brand_code' },
        { data: 'name', name: 'name' },
        { data: 'action', name: 'action' }
      ]
    })

    $(document).on('click', '.delete', function(e){
      var id = $(this).data('id');
      var url = "{{ route('brand.delete') }}";

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
                console.log(res);
                if (res.value) {
                  $('.tableBrand').DataTable().ajax.reload()
                }
              })
            } 
          })
        }
      })
    })
  </script>
@endpush