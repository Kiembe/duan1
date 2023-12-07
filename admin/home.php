<main>
    <div class="container">
        <h5>Tổng Quan</h5>
            <div class="statics board">
                <canvas id="myChart"></canvas>
                <div class="list_sta">
                    <p>Thông Kê 7 Ngày Gần Nhất</p>
                    <div class="money">
                        <div class="p"><p>Doanh Thu</p>
                        <p class="price">3482000000</p></div>
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div class="bill">
                        <div class="p">
                        <p>Đơn Hàng</p>
                        <p>400</p>
                        </div>
                        
                        <i class="fa-solid fa-file-circle-check"></i>
                    </div>
                </div>
            </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['2/12', '3/12', '4/12', '5/12', '6/12', '7/12'],
      datasets: [{
        label: 'Doanh Thu',
        data: [100, 213, 263, 211, 100, 401],
        borderWidth: 5,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.3,
        fill:true
      }]
    },
    
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }   
  });
</script>