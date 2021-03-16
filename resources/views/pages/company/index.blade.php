@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('company.create') }}" class="btn btn-sm btn-info">Tambah</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table tableCompany" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Wilayah</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>PIC</th>
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
    $('.tableCompany').DataTable({
    //   processing: true,
    //   serverSide: true,
    //   ajax: {
    //     url: "{{ route('company') }}",
    //     type: 'GET',
    //   },
    //   columns: [
    //     { data: 'DT_RowIndex', name: 'DT_RowIndex' },
    //     { data: 'company_code', name: 'company_code' },
    //     { data: 'name', name: 'name' },
    //     { data: 'region', name: 'region' },
    //     { data: 'phone', name: 'phone' },
    //     { data: 'email', name: 'email' },
    //     { data: 'person_in_charge', name: 'person_in_charge' },
    //     { data: 'action', name: 'action' }
    //   ]
    })

    $(document).on('click', '.delete', function(e){
      var id = $(this).data('id');
      var url = "{{ route('company.delete') }}";

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
                  $('.tableCompany').DataTable().ajax.reload()
                }
              })
            } 
          })
        }
      })
    })
  </script>
@endpush