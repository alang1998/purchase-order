@extends('app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <a href="" class="btn btn-sm btn-info">Kembali</a>
          </div>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
              @csrf
              @if ($purchase_order->id)
                @method('put')
              @endif
              <h4>This form page po</h4>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection