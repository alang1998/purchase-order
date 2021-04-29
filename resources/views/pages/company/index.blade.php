@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('company.create') }}" class="btn btn-sm btn-primary {{ count($company) > 0 ? 'disabled' : '' }}"><i class="fa fa-plus-circle"></i>&nbsp; Set Data</a>
          <a href="{{ route('company.edit', $company->first()) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>&nbsp; Edit</a>
        </div>
        <div class="card-body">          
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Nama
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $company->first()->name }}
            </div>
          </div>
          <hr>          
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Alamat
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $company->first()->address }}
            </div>
          </div>
          <hr>          
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Telepon
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $company->first()->phone }}
            </div>
          </div>
          <hr>          
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Fax
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $company->first()->fax }}
            </div>
          </div>
          <hr>          
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Email
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $company->first()->email }}
            </div>
          </div>
          <hr>          
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Penanggung Jawab
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              {{ $company->first()->person_in_charge }}
            </div>
          </div>
          <hr>          
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Logo
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              <img src="{{ asset('storage/company/logo/'.$company->first()->logo) }}" alt="logo-perusahaan" width="100px" class="">
            </div>
          </div>
          <hr>          
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Stampel
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6">
              <img src="{{ asset('storage/company/stamp/'.$company->first()->stamp) }}" alt="logo-perusahaan" width="100px" class="">
            </div>
          </div>
          <hr>
          {{-- <div class="table-responsive">
            <table class="table tableCompany" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>FAX</th>
                  <th>Email</th>
                  <th>PIC</th>
                  <th>Aksi</th>
                </tr>
              </thead>
            </table>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('.tableCompany').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('company') }}",
        type: 'GET',
      },
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'name', name: 'name' },
        { data: 'address', name: 'address' },
        { data: 'phone', name: 'phone' },
        { data: 'fax', name: 'fax' },
        { data: 'email', name: 'email' },
        { data: 'person_in_charge', name: 'person_in_charge' },
        { data: 'action', name: 'action' }
      ]
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