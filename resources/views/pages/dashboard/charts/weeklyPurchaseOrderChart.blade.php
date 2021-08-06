
<!-- pembelian perminggu chart -->
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Grafik Purchase Order</h2>
    </div>
    <div class="card-body">
      <canvas id="nomial-weekly-chart" height="150"></canvas>
    </div>
    <div class="card-footer">
      <small class="text-secondary">
        Grafik pembelian yang dibuat dalam 1 minggu terakhir.
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
      //   url: "{{ route('dashboard.getWeeklyPurchaseOrder') }}",
      //   dataType: 'json',
      //   success:function(result){
          let scalesOptions = {
            xAxes: [{
              gridLines: { display: false }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 10
              },
              gridLines: { 
                color: '#eff3f6', 
                drawBorder: false,
              },
            }]
          };
          
          let chartWeeklyLabels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
          let chartWeeklyData = ['20', '12', '18', '8', '7', '9', '12'];
          let ctxLineChart = document.getElementById("nomial-weekly-chart").getContext("2d");
          let lineChart = new Chart(ctxLineChart, {
            type: 'line',
            data: {
              labels: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
              datasets: [
                {
                  data: [30, 26, 38, 59, 17, 77, 45],
                  label: 'Purchase Order',
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