@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row" id="filterForm">
            <div class="col-md-3">
              <input type="date" name="startDate" id="startDate" class="form-control">
              <small>
                Pilih tanggal mulai periode
              </small>
            </div>
            <div class="col-md-3">
              <input type="date" name="endDate" id="endDate" class="form-control">
              <small>
                Pilih tanggal selesai periode
              </small>
            </div>
            <div class="col-md-6">
              <select name="supplier_id" id="supplierId" class="form-control mb-2">

              </select>
              <small class="text-secondary">
                Pilih Supplier untuk melihat Laporan Rekap Pembelian.
              </small>
            </div>
          </div>
        </div>
        <div class="card-header">
          <button id="exportToExcel" class="btn btn-sm btn-success">Export to excel</button>
        </div>
      </div>
      
      <div class="card">
        <div class="card-header">
          <h5 class="mt-2 supplierTitle">

          </h5>
          <span class="periode"></span>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered tablePurchaseOrder">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tanggal</th>
                  <th>Nomor</th>
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

      <div class="card">
        <div class="card-header">
          <h5 class="mt-2 rekapTitle">
            Rekap Total Order
          </h5>
          <span class="rekapPeriode text-secondary"></span>
        </div>
        <div class="card-body">          
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Berat (kg)
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6 grandTotalTonase">
              
            </div>
          </div>      
          <hr>
          <div class="row">
            <div class="col-md-2 mb-2 mb-md-0 font-weight-bold font-md-weight-normal">
              Pembelian
            </div>
            <div class="d-none d-md-block">
              :
            </div>
            <div class="col-md-6 grandTotal">
              
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>   
    $('#supplierId').select2({
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

    function setDataTable(startDate = null, endDate = null, supplierId = null) {
      
      $('.tablePurchaseOrder').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('purchase_order.report') }}",
          type: 'GET',
          data: {
            'startDate' : startDate,
            'endDate'   : endDate,
            'supplierId': supplierId
          }
        },
        columns: [
          { data: 'DT_RowIndex', name: 'DT_RowIndex' },
          { data: 'order_date', name: 'order_date' },
          { data: 'order_number', name: 'order_number' },
          { data: 'user', name: 'user' },
          { data: 'store', name: 'store' },
          { data: 'total', name: 'total' },
          { data: 'status', name: 'status' },
          { data: 'action', name: 'action' }
        ]
      });
      
    }

    $('.tablePurchaseOrder').DataTable();

    let startDate = '';
    let endDate = '';
    let supplier_id = '';

    $('#startDate').on('change', function (e) {
      startDate = e.target.value;
    })

    $('#endDate').on('change', function (e) {
      endDate = e.target.value;
    })

    $('#supplierId').on('change', function(e) {
      supplier_id = $(this).val();
    })

    $('#filterForm').on('change', function (e) { 
      $.ajax({
        type: 'GET',
        url: "{{ route('purchase_order.report.getReports') }}",
        dataType: 'json',
        data: {
          'startDate' : startDate,
          'endDate'   : endDate,
          'supplierId': supplier_id
        },
        success:function(result){
          $('.grandTotal').empty().append(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(result.grandTotal));
          $('.grandTotalTonase').empty().append(new Intl.NumberFormat('id-ID', { style: 'decimal' }).format(result.grandTotalTonase));

          if (result.supplier != null) {
            $('.supplierTitle').empty().append(result.supplier.name);
            $('.rekapTitle').empty().append('Rekap Total Order (' + result.supplier.name + ')');
          }

          if (startDate != '' && endDate != '') {
            $('.periode').empty().append($.datepicker.formatDate( "dd/mm/yy", new Date(startDate))+' - '+$.datepicker.formatDate( "dd/mm/yy", new Date(endDate)));
            $('.rekapPeriode').empty().append($.datepicker.formatDate( "dd/mm/yy", new Date(startDate))+' - '+$.datepicker.formatDate( "dd/mm/yy", new Date(endDate)));
          }

          exportButton();

        }
      })

      $('.tablePurchaseOrder').DataTable().destroy();
      setDataTable(startDate, endDate, supplier_id);
    })

    $('#exportToExcel').on('click', function () {
      
      var url = "{{ route('purchase_order.report.exportToExcel') }}";    
      $(location).attr('href', url+'?startDate='+startDate+'&endDate='+endDate+'&supplierId='+supplier_id);

    })


    $(document).ready(function () {
      exportButton();
    })

    function exportButton() {
      
      if ((startDate != '' && endDate != '') || supplier_id != '') {
        $('#exportToExcel').removeClass('disabled');
        $('#exportToExcel').attr('disabled', false);
      } else {
        $('#exportToExcel').addClass('disabled');
        $('#exportToExcel').attr('disabled', true);
      }
      
    }

  </script>
@endpush