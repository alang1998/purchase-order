@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('purchase_order') }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
        </div>
        <div class="card-body">
          <form action="{{ route($action, $purchase_order) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($purchase_order->id)
              @method('put')
            @endif
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="supplier">Supplier</label>
                  <select name="supplier_id" id="supplier" class="form-control" required>
                    @if ($purchase_order->supplier_id)
                      <option value="{{ $purchase_order->supplier_id }}">{{ $purchase_order->supplier->supplier_code.' - '.$purchase_order->supplier->name }}</option>
                    @else
                      <option value="">Pilih Supplier</option>
                    @endif
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
                  <input type="date" name="order_date" id="orderDate" class="form-control" value="{{ $purchase_order->order_date ?? date('Y-m-d') }}" readonly>
                  <small class="text-secondary">Terisi secara otomatis dan tidak dapat diubah.</small>
                  
                  @error('order_number')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="orderNumber">Nomor Order</label>
                  <input type="text" name="order_number" id="orderNumber" class="form-control" value="{{ $purchase_order->order_number }}" readonly>
                  <small class="text-secondary">Terisi secara otomatis dan tidak dapat diubah.</small>
                  
                  @error('order_number')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="store">Penerima</label>
                  <select name="store_id" id="store" class="form-control" required>
                    @if ($purchase_order->store_id)
                      <option value="{{ $purchase_order->store_id }}">{{ $purchase_order->store->name }}</option>
                    @endif
                    <option value="">Pilih Cabang</option>
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
                    $x = 0;
                  @endphp
                  @if ($purchase_order->id)
                    @php
                      $grandTotal = 0;
                      $grandTotalTonase = 0;
                    @endphp
                    @foreach ($purchase_order->detail_orders as $detail_order)                   
                      <div id="row{{ $i }}">
                        <input type="hidden" name="item[]" value="{{ $i }}">
                        <div class="form-row mb-2 formChange" data-classquantity="dataQuantity{{ $i }}" data-classprice="dataPrice{{ $i }}" data-classweight="dataWeight{{ $i }}" data-classtotal="dataTotal{{ $i }}" data-classtotaltonase="dataTotalTonase{{ $i }}">
                          <div class="col-md-5">
                            <select name="item_id[]" id="itemId{{ $i }}" class="item form-control" data-setprice="price{{ $i }}" data-setunit="setUnit{{ $i }}" data-setweight="setWeight{{ $i }}" required>
                              <option value="{{ $detail_order->item_id }}" selected>{{ '['.$detail_order->item->item_code.'] '.$detail_order->item->name }}</option>
                            </select>

                            {{-- error --}}
                            @error('store_id')
                              <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-md-1">
                            <input type="number" name="quantity[]" class="form-control dataQuantity{{ $i }}" placeholder="Jumlah" value="{{ $detail_order->quantity }}" required>

                            {{-- error --}}
                            @error('quantity')
                              <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-md-1">
                            <input type="text" name="unit[]" class="form-control dataUnit{{ $i }} setUnit{{ $i }}" placeholder="" value="{{ $detail_order->item->unit->name }}" readonly>

                            {{-- error --}}
                            @error('store_id')
                              <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <div class="col-md-2">
                            <input type="number" name="price[]" id="price{{ $i }}" class="form-control price{{ $i }} dataPrice{{ $i }}" placeholder="Harga" value="{{ $detail_order->price }}" required>

                            {{-- error --}}
                            @error('store_id')
                              <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <input type="hidden" name="weight[]" id="weight{{ $i }}" class="form-control setWeight{{ $i }} dataWeight{{ $i }}" placeholder="Berat" value="{{ $detail_order->item->weight }}" required>

                          {{-- error --}}
                          @error('weight')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                          @enderror
                          <div class="col-md-3">
                            <div class="input-group">
                              <input type="number" name="total[]" class="form-control total dataTotal{{ $i }}" placeholder="Total" value="{{ $detail_order->quantity * $detail_order->price }}" readonly>                            
                              <input type="hidden" name="totalTonase[]" class="form-control totalTonase dataTotalTonase{{ $i }}" placeholder="Total Tonase" value="{{ $detail_order->quantity * $detail_order->item->weight }}" readonly>
                              <div class="input-group-append">
                                <button class="btn fa {{ ++$x === count($purchase_order->detail_orders) ? 'btn-success fa-plus btnPlus' : 'btn-danger fa-minus btnRemove' }}" type="button" id="btnPlus{{ $i }}"></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @php
                        $i++; 
                        $grandTotal += ($detail_order->quantity*$detail_order->price);   
                        $grandTotalTonase += ($detail_order->quantity*$detail_order->item->weight);   
                      @endphp
                    @endforeach
                    @php
                      $i--;    
                    @endphp
                  @else
                    <div id="row1">
                      <input type="hidden" name="item[]" value="{{ $i }}">
                      <div class="form-row mb-2 formChange" data-classquantity="dataQuantity1" data-classprice="dataPrice1" data-classweight="dataWeight1" data-classtotal="dataTotal1" data-classtotaltonase="dataTotalTonase1">
                        <div class="col-md-5">
                          <select name="item_id[]" id="itemId1" class="item form-control" data-setprice="price1" data-setunit="setUnit1" data-setweight="setWeight1" required>
                            <option value="">Pilih Barang</option>
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
                            <input type="hidden" name="totalTonase[]" class="form-control totalTonase dataTotalTonase1" placeholder="Total Tonase" readonly>
                            <div class="input-group-append">
                              <button class="btn btn-success fa fa-plus btnPlus" type="button" id="btnPlus1"></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif

                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="note">Catatan</label>
                  <textarea name="note" id="" cols="30" rows="5" class="form-control">{{ $purchase_order->note ?? '' }}</textarea>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="grandTotalTonase">Tonase</label>
                  <input type="number" name="grandTotalTonase" class="form-control grandTotalTonase" step="0.01" readonly value="{{ $purchase_order->id ? $grandTotalTonase : '' }}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="grandTotal">Grand Total</label>
                  <input type="number" name="grandTotal" class="form-control grandTotal" step="0.01" readonly value="{{ $purchase_order->id ? $grandTotal : '' }}">
                </div>
                <button type="submit" class="btn btn-primary float-right" style="margin-top: 34px"><i class="fa fa-save"></i>&nbsp; {{ $submitButton }}</button>
              </div>
            </div>
          </form>
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
        type    : 'GET',
        url     : '{{ route("api.getSuppliers") }}',
        dataType: 'json',
        delay   : 250,
        processResults: function(data){
          return {
            results: $.map(data, function(item){
              return {
                text    : item.supplier_code+' - '+item.name,
                id      : item.id
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
        type    : 'GET',
        url     : '{{ route("api.getStores") }}',
        dataType: 'json',
        delay   : 250,
        processResults: function(data){
          return {
            results: $.map(data, function(item){
              return {
                text    : item.name,
                id      : item.id
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
        type    : 'GET',
        url     : '{{ route("api.getItems") }}',
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
    let supplierId  = {{ $purchase_order->supplier_id ?? '0' }};
    let i           = {{ $i }};

    function getDetailSupplier(supplier_id) {      
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
    }

    function getItemsOrder() {      

      let grandTotal       = 0;
      let grandTotalTonase = 0;
      $('input[name^="item"]').each(function(){
        let itemId = $(this).val();

        $.ajax({
          type  : 'GET',
          url   : "{{ route('purchase_order.getItemsOrder') }}",
          data  : {
            'item_id'     : $('#itemId'+itemId).val(),
            'supplier_id' : supplierId
          },
          success:function(result){
            if (result.status == 200) {             
              let total    = 0;
              let tonase   = 0;

              let quantity = $('.dataQuantity'+itemId).val();
              let price    = $('.dataPrice'+itemId).val(result.item.price);
              let weight   = $('.dataWeight'+itemId).val(result.item.weight);
              let unit     = $('.dataUnit'+itemId).val(result.item.unit.name);

              total   = result.item.price * quantity;
              tonase  = result.item.weight * quantity;

              $('.dataTotal'+itemId).val(total);
              $('.dataTotalTonase'+itemId).val(tonase);

              grandTotal       += total;
              grandTotalTonase += tonase;
              
              $('.grandTotal').val(grandTotal);
              $('.grandTotalTonase').val(grandTotalTonase);
            }
          }
        })
      });

    }

    // Change supplier -> get order number and supplier details
    $('#supplier').on('change', function(){
      let supplier_id = $(this).val();
      supplierId      = supplier_id;

      // Get order number
      $.ajax({
        type    : 'GET',
        url     : "{{ route('purchase_order.getOrderNumber') }}",
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

      // supplier detail
      getDetailSupplier(supplier_id);

      // Set price
      getItemsOrder();

    });
    
    // fill detail supplier when edit
    $(document).ready(function(){

      @if($purchase_order->id)
        getDetailSupplier(supplierId);
      @endif

    });

    $(document).on('change', '.item', function(){
      let id = $(this).val();      
      let setprice = '.'+$(this).data('setprice');
      let setweight = '.'+$(this).data('setweight');
      let setunit = '.'+$(this).data('setunit');

      $.ajax({
        type  : 'GET',
        url   : "{{ route('purchase_order.getItemsOrder') }}",
        data  : {
          'item_id'     : id,
          'supplier_id' : supplierId
        },
        success: function(result){
          $(setprice).val(result.item.price);
          $(setweight).val(result.item.weight);
          $(setunit).val(result.item.unit.name);
        }

      });
    })

    $(document).on('click', '.btnPlus', function(){
      i++;      
      let itemInput = `        
        <div id="row`+ i +`">
          <input type="hidden" name="item[]" value="`+ i +`">
          <div class="form-row mb-2 formChange" data-classquantity="dataQuantity`+ i +`" data-classprice="dataPrice`+ i +`" data-classweight="dataWeight`+ i +`" data-classtotal="dataTotal`+ i +`" data-classtotaltonase="dataTotalTonase`+ i +`">
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
                <input type="hidden" name="totalTonase[]" class="form-control totalTonase dataTotalTonase`+ i +`" placeholder="Total Tonase" readonly>
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

    $(document).on('click', '.btnRemove', function(){
        let id       = $(this).attr('id');
        let removeId = id.substring(7, 8);

        let total            = 0;
        let tonase           = 0;
        let grandTotal       = 0;
        let grandTotalTonase = 0;

        $('#row'+removeId).remove();

        let totalArr = $('.total').map(function(){
            return $(this).val();
        }).get();

        let totalTonaseArr = $('.totalTonase').map(function(){
            return $(this).val();
        }).get();

        console.log(totalTonaseArr, totalArr);

        for (let i = 0; i < totalArr.length; i++) {
            grandTotal       += parseFloat(totalArr[i]);
            grandTotalTonase += parseFloat(totalTonaseArr[i]);            
        }

        $('.grandTotal').val(grandTotal);
        $('.grandTotalTonase').val(grandTotalTonase);
        
    })

    $(document).on('change', '.formChange', function(){
        let total            = 0;
        let tonase           = 0;
        let grandTotal       = 0;
        let grandTotalTonase = 0;

        let classQuantity       = '.'+$(this).data('classquantity');
        let classPrice          = '.'+$(this).data('classprice');
        let classWeigth         = '.'+$(this).data('classweight');
        let classTotal          = '.'+$(this).data('classtotal');
        let classTotalTonase    = '.'+$(this).data('classtotaltonase');

        let quantity    = $(classQuantity).val();
        let price       = $(classPrice).val();
        let weight      = $(classWeigth).val();

        console.log(classQuantity, classPrice, classWeigth);
        console.log(quantity, price, weight);

        total           = quantity * price;
        tonase          = quantity * weight;

        $(classTotal).val(total);
        $(classTotalTonase).val(tonase);

        let totalArr = $('.total').map(function(){
            return parseInt($(this).val());
        }).get();

        let totalTonaseArr = $('.totalTonase').map(function(){
            return parseInt($(this).val());
        }).get();

        for (let i = 0; i < totalArr.length; i++) {
            grandTotal       += (totalArr[i]);
            grandTotalTonase += (totalTonaseArr[i]);            
        }

        $('.grandTotal').val(grandTotal);
        $('.grandTotalTonase').val(grandTotalTonase);
    });

    
  </script>


@endpush