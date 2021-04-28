@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('item.create') }}" class="btn btn-sm btn-info">Tambah</a>
          <a href="" class="btn btn-sm btn-success" id="importProduk">Import Produk</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table tableItem" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Merk</th>
                  <th>Nama</th>
                  <th>Berat (Kg)</th>
                  <th>Kemasan</th>
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

@section('modal')
  {{-- Import Modal --}}  
  <div class="modal fade" id="modalImportProduk" tabindex="-1" role="dialog" aria-labelledby="modalImportProdukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalImportProdukLabel">Import Data Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('item.import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              Pastikan merk sudah dimasukkan kedalam data master dan kode merk sama dengan di excel, jika berbeda data tidak akan masuk ke sistem.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="form-group">
              <label for="file">Pilih file excel</label>
              <input type="file" name="file" id="file" class="form-control" required>
              <small>* format file excel dapat di download <a href="#">disini</a></small>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('.tableItem').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('item') }}",
        type: 'GET',
      },
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'item_code', name: 'item_code' },
        { data: 'brand', name: 'brand' },
        { data: 'name', name: 'name' },
        { data: 'weight', name: 'weight' },
        { data: 'unit', name: 'unit' },
        { data: 'action', name: 'action' }
      ]
    })

    $('#importProduk').on('click', function(e){
      $('#modalImportProduk').modal('show');
      e.preventDefault();
    })

    $(document).on('click', '.delete', function(e){
      var id = $(this).data('id');
      var url = "{{ route('item.delete') }}";

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
                  $('.tableItem').DataTable().ajax.reload()
                }
              })
            } 
          })
        }
      })
    })
  </script>
@endpush