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

                  <div id="detailSupplier">

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
                  
                  <div id="formPlus">
                    @php
                      $i = 1;
                    @endphp
                    <div id="row1">
                      <input type="hidden" name="item[]" value="{{ $i }}">
                      <div class="form-row mb-2 formChange" data-classQuantity="dataQuantity1" data-classPrice="dataPrice1" data-classTotal="dataTotal1">
                        <div class="col-md-5">
                          <select name="item_id[]" id="itemId1" class="item form-control" data-setprice="price1" data-setunit="setUnit1" data-setweight="setWeight1" required>
  
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
                          <input type="text" name="unit[]" class="form-control dataUnit1 setUnit1" placeholder="" readonly>
  
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
                        <input type="hidden" name="weight[]" id="weight1" class="form-control setWeight1 dataWeight1" placeholder="Berat" required>
  
                        {{-- error --}}
                        @error('weight')
                          <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-md-3">
                          <div class="input-group">
                            <input type="number" name="total[]" class="form-control total dataTotal1" placeholder="Total" readonly>
                            <div class="input-group-append">
                              <button class="btn btn-success fa fa-plus btnPlus" type="button" id="btnPlus1"></button>
                            </div>
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
                    <label for="grandTotal">Grand Total</label>
                    <input type="number" name="grandTotal" class="form-control grandTotal" step="0.01" readonly value="">
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
  {{-- Select2 --}}
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
        data: function (params) {
          return {
            a: $.trim(params.term)
          };
        },
        processResults: function(data){
          return {
            results: data
          };
        },
        cache: true
      }
    });
  </script>

  <script>
    let supplierId = 0;
    let i = {{ $i }};
    // Change supplier -> get order number and supplier details
    $('#supplier').on('change', function(){
      let supplier_id = $(this).val();
      supplierId = supplier_id;
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

      $.ajax({
        type: 'GET',
        url: "{{ route('purchase_order.getDetailSupplier') }}",
        data: {
          'supplier_id': supplier_id,
        },
        success:function(result){
          if (result.status == 200) {
              let html = `
                <h4 for="detailSupplier">Detail Supplier</h4>
                <hr>
                <div class="form-group row">
                  <label class="col-md-4 font-weight-bold" for="kodeSupplier">Kode</label>
                  <div class="col-md-8">`+ result.supplier.supplier_code +`</div>

                  <label class="col-md-4 font-weight-bold" for="kodeSupplier">Nama</label>
                  <div class="col-md-8">`+ result.supplier.name +`</div>

                  <label class="col-md-4 font-weight-bold" for="kodeSupplier">Alamat</label>
                  <div class="col-md-8">`+ result.supplier.address +`</div>

                  <label class="col-md-4 font-weight-bold" for="kodeSupplier">Telepon</label>
                  <div class="col-md-8">`+ result.supplier.phone +`</div>
                  
                  <label class="col-md-4 font-weight-bold" for="kodeSupplier">Penanggung Jawab</label>
                  <div class="col-md-8">`+ result.supplier.person_in_charge +`</div>
                </div>
              `
              $('#detailSupplier').empty();
              $('#detailSupplier').append(html);
          }
        }
      })

    });
    
    $(document).on('change', '.item', function(){
      let item_id = $(this).val();
      let setPrice = '.'+$(this).data('setprice');
      let setUnit = '.'+$(this).data('setunit');
      let setWeight = '.'+$(this).data('setweight');

      console.log(setPrice, setUnit, setWeight);
      $.ajax({
        type: 'GET',
        url: "{{ route('purchase_order.getItemsOrder') }}",
        data: {
          'item_id': item_id,
          'supplier_id': supplierId
        },
        success:function(result){
          if (result.status == 200) {
            $(setPrice).val(result.item.price);
            $(setUnit).val(result.item.unit.name);
            $(setWeight).val(result.item.weight);
          }
          console.log($(setWeight).val());
        }
      });
    })

    $(document).on('click', '.btnPlus', function(){
      i++;      
      let itemInput = `        
        <div id="row`+ i +`">
          <input type="hidden" name="item[]" value="">
          <div class="form-row mb-2 formChange" data-classQuantity="dataQuantity`+ i +`" data-classPrice="dataPrice`+ i +`" data-classTotal="dataTotal`+ i +`">
            <div class="col-md-5">
              <select name="item_id[]" id="itemId`+ i +`" class="item form-control" data-setprice="price`+ i +`" data-setunit="setUnit`+ i +`" data-setweight="setWeight`+ i +`" required>

              </select>

              {{-- error --}}
              @error('item_id')
                <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-1">
              <input type="number" name="quantity[]" class="form-control dataQuantity`+ i +`" placeholder="Jumlah" required>

              {{-- error --}}
              @error('quantity')
                <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-1">
              <input type="text" name="unit[]" class="form-control dataUnit`+ i +` setUnit`+ i +`" placeholder="" readonly>

              {{-- error --}}
              @error('store_id')
                <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-2">
              <input type="number" name="price[]" id="price`+ i +`" class="form-control price`+ i +` dataPrice`+ i +`" placeholder="Harga" required>

              {{-- error --}}
              @error('store_id')
                <div class="mt-2 text-danger">{{ $message }}</div>
              @enderror
            </div>
            <input type="hidden" name="weight[]" id="weight`+ i +`" class="form-control setWeight`+ i +` dataWeight`+ i +`" placeholder="Berat" required>

            {{-- error --}}
            @error('weight')
              <div class="mt-2 text-danger">{{ $message }}</div>
            @enderror
            <div class="col-md-3">
              <div class="input-group">
                <input type="number" name="total[]" class="form-control total dataTotal`+ i +`" placeholder="Total" readonly>
                <div class="input-group-append">
                  <button class="btn btn-success fa fa-plus btnPlus" type="button" id="btnPlus`+ i +`"></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      `
      $('#formPlus').append(itemInput);
      let btnId = ($(this).attr('id'));
      console.log(btnId, ('#btnPlus'+i));
      if (btnId > $('#btnPlus'+i)) {
        $('#'+btnId).removeClass("btn-success fa-plus btnPlus").addClass("btn-danger fa-minus btnRemove");
      }
      
      $('#itemId'+i).select2({
        allowClear: true,
        ajax: {
          type: 'GET',
          url: '{{ route("api.getItems") }}',
          dataType: 'json',
          data: function (params) {
            return {
              a: $.trim(params.term)
            };
          },
          processResults: function(data){
            return {
              results: data
            };
          },
          cache: true
        }
      });
    })
  </script>


@endpush