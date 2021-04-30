@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('supplier.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Tambah</a>
          <a href="#" class="btn btn-sm btn-success importSupplierPrice"><i class="fa fa-upload"></i> &nbsp;Import Harga Supplier</a>
        </div>
        <div class="card-body">
          {{-- <div class=""> --}}
            <table class="table tableSupplier" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Wilayah</th>
                  <th>PIC</th>
                  <th width="20%">Aksi</th>
                </tr>
              </thead>
            </table>
          {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('modal')
{{-- Import Modal --}}  
<div class="modal fade" id="modalImportPrice" tabindex="-1" role="dialog" aria-labelledby="modalImportPriceLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalImportPriceLabel">Import Data Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('supplier.importItemsPrice') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Pastikan barang/produk sudah dimasukkan kedalam data master dan kode barang sama dengan di excel, jika berbeda data tidak akan masuk ke sistem.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="form-group">
            <label for="file">Pilih file excel</label>
            <input type="file" name="file" id="file" class="form-control-file" required>
            <small>* Format file excel dapat di download <a href="#">disini</a></small>
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
    $('.tableSupplier').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('supplier') }}",
        type: 'GET',
      },
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'supplier_code', name: 'supplier_code' },
        { data: 'name', name: 'name' },
        { data: 'region', name: 'region' },
        { data: 'person_in_charge', name: 'person_in_charge' },
        { data: 'action', name: 'action' }
      ]
    })

    $(document).on('click', '.delete', function(e){
      var id = $(this).data('id');
      var url = "{{ route('supplier.delete') }}";

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
                  $('.tableSupplier').DataTable().ajax.reload()
                }
              })
            } 
          })
        }
      })
    })

    $('.importSupplierPrice').on('click', function (e) {
      $('#modalImportPrice').modal('show');
    })
  </script>
@endpush