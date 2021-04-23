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
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select name="supplier_id" id="supplier" class="form-control">
  
                    </select>
                    <small class="text-secondary">Cari supplier berdasarkan kode atau nama.</small>
                    
                    @error('supplier_id')
                      <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <h4 for="detailSupplier">Detail Supplier</h4>
                  <hr>
                  <div class="form-group row">
                    <label class="col-md-4 font-weight-bold" for="kodeSupplier">Kode</label>
                    <div class="col-md-8">RH-P</div>

                    <label class="col-md-4 font-weight-bold" for="kodeSupplier">Nama</label>
                    <div class="col-md-8">PT. RAJAWALI HYOTO PALEMBANG</div>

                    <label class="col-md-4 font-weight-bold" for="kodeSupplier">Alamat</label>
                    <div class="col-md-8">JL SUKABANGUN 1 NO.1390-A</div>

                    <label class="col-md-4 font-weight-bold" for="kodeSupplier">Telepon</label>
                    <div class="col-md-8">085267111090</div>
                    
                    <label class="col-md-4 font-weight-bold" for="kodeSupplier">Penanggung Jawab</label>
                    <div class="col-md-8">Bp. Jumardiansyah</div>
                  </div>

                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="orderDate">Tanggal Order</label>
                    <input type="date" name="order_date" id="orderDate" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                    <small class="text-secondary">Terisi secara otomatis dan tidak dapat diubah.</small>
                    
                    @error('order_number')
                      <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="orderNumber">Nomor Order</label>
                    <input type="text" name="order_number" id="orderNumber" class="form-control" readonly>
                    <small class="text-secondary">Terisi secara otomatis dan tidak dapat diubah.</small>
                    
                    @error('order_number')
                      <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="store">Penerima</label>
                    <select name="store_id" id="store" class="form-control">
                      
                    </select>
                    <small class="text-secondary">Barang PO akan dikirim ke cabang yang dipilih.</small>

                    @error('store_id')
                      <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <hr>
              {{-- Label List Barang PO --}}
              <div class="row">
                <div class="col-md-5">
                  <label for="barangId">Barang</label>
                </div>
                <div class="col-md-1">
                  <label for="qty">Jumlah</label>
                </div>
                <div class="col-md-1">
                  <label for="kemasan">Kemasan</label>
                </div>
                <div class="col-md-2">
                  <label for="harga">Harga</label>
                </div>
                <div class="col-md-2">
                  <label for="total">Total</label>
                </div>
              </div>
              {{-- Barang PO --}}
              <div class="row">
                <div class="col-md-12">
                  <div id="row1">
                    <input type="hidden" name="item[]" value="">
                    <div class="form-row mb-2 formChange" data-classQuantity="dataQuantity1" data-classPrice="dataPrice1" data-classTotal="dataTotal1">
                      <div class="col-md-5">
                        <select name="item_id[]" id="itemId1" class="item form-control" data-setPrice="price1" data-setUnit="setUnit1" data-setWeight="setWeight1" required>

                        </select>

                        {{-- error --}}
                        @error('store_id')
                          <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-1">
                        <input type="number" name="quantity[]" class="form-control dataQuantity1" placeholder="Jumlah" required>

                        {{-- error --}}
                        @error('quantity')
                          <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-1">
                        <input type="text" name="unit[]" class="form-control dataUnit1 unit1" placeholder="" readonly>

                        {{-- error --}}
                        @error('store_id')
                          <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-2">
                        <input type="number" name="price[]" id="price1" class="form-control price1 dataPrice1" placeholder="Harga" required>

                        {{-- error --}}
                        @error('store_id')
                          <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-3">
                        <div class="input-group">
                          <input type="number" name="total[]" class="form-control total dataTotal1" placeholder="Total" readonly>
                          <div class="input-group-append">
                            <button class="btn btn-success fa fa-plus remove" type="button" id="1"></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="offset-md-6 col-md-3">
                  <div class="form-group">
                    <label for="totalTonase">Tonase</label>
                    <input type="number" name="totalTonase" class="form-control totalTonase" step="0.01" readonly value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="jml">Total</label>
                    <input type="number" name="jml" class="form-control jml" step="0.01" readonly value="">
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary mt-3 float-right"><i class="fa fa-save"></i>&nbsp; {{ $submitButton }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $('#supplier').select2({
      allowClear: true,
      ajax: {
        type: 'GET',
        url: '{{ route("api.getSuppliers") }}',
        dataType: 'json',
        delay: 250,
        processResults: function(data){
          return {
            results: $.map(data, function(item){
              return {
                text: item.supplier_code+' - '+item.name,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    });

    $('#store').select2({
      allowClear: true,
      ajax: {
        type: 'GET',
        url: '{{ route("api.getStores") }}',
        dataType: 'json',
        delay: 250,
        processResults: function(data){
          return {
            results: $.map(data, function(item){
              return {
                text: item.name,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    });

    $('.item').select2({
      allowClear: true,
      ajax: {
        type: 'GET',
        url: '{{ route("api.getItems") }}',
        dataType: 'json',
        delay: 250,
        processResults: function(data){
          return {
            results: $.map(data, function(item){
              return {
                text: item.item_code+' - '+item.name,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    });
  </script>

  <script>
    $('#supplier').on('change', function(){
      let supplier_id = $(this).val();

      // Get order number
      $.ajax({
        type: 'GET',
        url: "{{ route('purchase_order.getOrderNumber') }}",
        data: {
          'supplier_id': supplier_id,
        },
        success:function(result){
          if (result.status == 200) {
            $('#orderNumber').val(result.orderNumber);            
          } else {
            alert(result.message);
          }
        }
      })

    });
  </script>
@endpush