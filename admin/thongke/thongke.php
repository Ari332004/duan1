<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy giá trị ngày bắt đầu và ngày kết thúc từ form
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  // Thực hiện thống kê doanh thu dựa trên khoảng ngày
  $results = thongke_sp($start_date, $end_date);

  // Tính tổng doanh thu
  $total_revenue = 0;
  foreach ($results as $row) {
      $total_revenue += (int) $row['doanh_thu'];
  }} else {
    // Nếu chưa nhận được dữ liệu từ form, thực hiện thống kê mặc định
    $results = thongke_sp();
    $total_revenue = 0;
    // Tính tổng doanh thu
    foreach ($results as $row) {
        $total_revenue += (int) $row['doanh_thu'];
    }}

    $data = [['Ngày', 'Doanh thu', ['role' => 'style']]];
    $colors = ['gray', '#76A7FA', 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF',
     'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2', '#FF00FF']; // Mảng mã màu mới
    
    if (count($results) > 0) {
        foreach ($results as $index => $row) {
            $data[] = [$row['ngay'], (int) $row['doanh_thu'], $colors[$index % count($colors)]];
        }
    } else {
        // Nếu không có dữ liệu, thêm một hàng trống để biểu đồ hiển thị trống
        $data[] = ['', 0, ''];
    }
    
    $dataJson = json_encode($data);
?>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f5f5f5;

}

#chart_div {
  width: 70%;
  height: 500px;
  float: left;
  background-color: #fff;
  /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
  border-radius: 4px;
  padding: 20px;
  box-sizing: border-box;
  border-right: 1px solid rgba(0, 0, 0, 0.1);

}

h2 {
  margin-top: 0;
  font-size: 22px;
  /* Kích thước chữ được tăng lên */
  font-weight: bold;
}

form {
  padding: 20px;
  background-color: #fff;
  /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
  border-radius: 4px;
  box-sizing: border-box;

}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="date"] {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;

}

input[type="submit"] {
  padding: 8px 16px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}
</style>
<script type="text/javascript">
google.charts.load('current', {
  packages: ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable(<?php echo $dataJson; ?>);

  var options = {
    title: 'Doanh thu theo ngày',
    height: 400,
    bar: {
      groupWidth: '60%'
    },
    legend: {
      position: 'none'
    },
    vAxis: {
      title: 'Doanh thu (VNĐ)'
    },
    hAxis: {
      title: 'Ngày'
    }
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}

document.querySelector('form').addEventListener('submit', function(event) {
  event.preventDefault(); // Ngăn chặn form gửi dữ liệu lên server

  // Lấy giá trị ngày bắt đầu và ngày kết thúc từ form
  var startDate = document.getElementById('start_date').value;
  var endDate = document.getElementById('end_date').value;

  // Gửi yêu cầu AJAX để cập nhật biểu đồ dựa trên khoảng ngày mới
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Biểu đồ được cập nhật thành công
      drawChart();
    }
  };
  xhr.send('start_date=' + startDate + '&end_date=' + endDate);
});
</script>
<div class="d-flex flex-row" style="
  background-color: rgb(255, 255, 255);">
  <div id="chart_div"></div>


  <form method="POST" action="">
    <div>
      <h2>Tổng doanh thu: <?= number_format($total_revenue, 0, '', ','); ?> VNĐ</h2>
    </div>

    <label for="start_date">Ngày bắt đầu:</label>
    <input type="date" id="start_date" name="start_date" placeholder="Ngày bắt đầu">

    <label for="end_date">Ngày kết thúc:</label>
    <input type="date" id="end_date" name="end_date" placeholder="Ngày kết thúc"><br><br>

    <div class="row">
      <input class="col-auto" type="submit" value="Thống kê">
      <a href="index.php?act=dttt&page=thongke" class="col-auto"><input class="btn btn-primary mr10 checked"
          type="button" value="Biểu đồ tháng"></a>
      <a href="index.php?act=list&page=thongke" class="col-auto"><input class="btn btn-primary mr10 checked"
          type="button" value="Quay lại"></a>
    </div>
  </form>
</div>