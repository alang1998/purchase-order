
<!-- pembelian perminggu chart -->
<div class="card">
  <div class="card-header">
    <h2 class="card-title">Grafik Produk Terbaik</h2>
  </div>
  <div class="card-body">
    <canvas id="donut-chart" height="150"></canvas>
  </div>
  <div class="card-footer">
    <small class="text-secondary">
      Grafik 5 produk yang paling sering dibeli dari keseluruhan pembelian.
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
    //   url: "{{ route('dashboard.getBestProduct') }}",
    //   dataType: 'json',
    //   success:function(result){
        
        var ctxDonutChart = document.getElementById("donut-chart").getContext("2d");
        var donutChart = new Chart(ctxDonutChart, {
          type: 'doughnut',
          data: {
            labels: ['ACL1-1146', 'PLR01-BLACK', 'EV25P-845EXT', 'G1-1717', 'BLZ-700MIX'],
            datasets: [
              {
                data: ['30', '30', '20', '10', '10'],
                backgroundColor: ['#4A90E2', '#7CAC25', '#FF4402', '#AB7DF6', '#F3BB23', '#20B2AA', '#1DBB8E'],
              }
              
            ]
          },
          options: {
            responsive: true,
            legend: {
              position: 'right',
            },
          }
        });

    //   }
    // });

  })
</script>
@endpush