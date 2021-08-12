
<!-- pembelian perminggu chart -->
<div class="card">
  <div class="card-header">
    <h2 class="card-title">Grafik Tonase Pembelian</h2>
  </div>
  <div class="card-body">
    <canvas id="tonase-chart" height="150"></canvas>
  </div>
  <div class="card-footer">
    <small class="text-secondary">
      Grafik tonase pembelian yang dibuat dalam 1 minggu terakhir.
    </small>
  </div>
</div>
<!-- end pembelian perminggu chart -->

@push('scripts')
<script>

  $(document).ready(function() {
    
    Chart.defaults.global.defaultFontColor = '#a0aeba';  
      
    // $.ajax({
    //   type: 'GET',
    //   url: "{{ route('dashboard.weightPurchaseOrder') }}",
    //   dataType: 'json',
    //   success:function(result){
    //     console.log(result);
        let scalesOptions = {
          xAxes: [{
            gridLines: { display: false }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5
            },
            gridLines: { 
              color: '#eff3f6', 
              drawBorder: false,
            },
          }]
        };
        
        let chartWeeklyLabels = result.day;
        let chartWeeklyData = result.po_count_data;
        let ctxLineChart = document.getElementById("tonase-chart").getContext("2d");
        let lineChart = new Chart(ctxLineChart, {
          type: 'line',
          data: {
            labels: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            datasets: [
              {
                data: [1523, 235, 658, 778, 856, 876, 2198],
                label: 'Tonase',
                borderWidth: 2,
                pointRadius: 3,
                pointHoverRadius: 5,
                borderColor: '#45aeef',
                backgroundColor: 'transparent'
              }
            ]
          },
          options: {
            responsive: true,
            scales: scalesOptions,
            legend: {
              onHover: function(e) {
                e.target.style.cursor = 'pointer';
              }
            }
          }
        });
    //   }
    // });

  })
</script>
@endpush