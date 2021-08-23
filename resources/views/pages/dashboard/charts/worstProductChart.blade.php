
<!-- pembelian perminggu chart -->
<div class="card">
  <div class="card-header">
    <h2 class="card-title">Grafik Produk Terendah</h2>
  </div>
  <div class="card-body">
    <canvas id="worst-product" height="150"></canvas>
  </div>
  <div class="card-footer">
    <small class="text-secondary">
      Grafik 7 produk yang paling jarang dibeli dari keseluruhan pembelian.
    </small>
  </div>
</div>
<!-- end pembelian perminggu chart -->

@push('scripts')
<script>

  $(document).ready(function() {
    
    Chart.defaults.global.defaultFontColor = '#a0aeba';  
      
    $.ajax({
      type: 'GET',
      url: "{{ route('dashboard.getWorstProduct') }}",
      dataType: 'json',
      success:function(result){
        var ctxDonutChart = document.getElementById("worst-product").getContext("2d");
        var donutChart = new Chart(ctxDonutChart, {
          type: 'doughnut',
          data: {
            labels: result.labels,
            datasets: [
              {
                data: result.count,
                backgroundColor: ['#4A90E2', '#7CAC25', '#FF4402', '#AB7DF6', '#F3BB23', '#20B2AA', '#1DBB8E'],
              }
              
            ]
          },
          plugins: [ChartDataLabels],
          options: {
            responsive: true,
            legend: {
              position: 'right',
            },
            plugins: {
              datalabels: {
                formatter: (value, ctxDonutChart) => {
                  let sum = 0;
                  let dataArr = result.count;
                  dataArr.map(data => {
                    sum += parseInt(data);
                  });
                  let percentage = (value*100 / sum).toFixed(2)+"%";
                  console.log(percentage);
                  return percentage;
                },
                color: '#fff',
              }
            }
          }
        });

      }
    });

  })
</script>
@endpush