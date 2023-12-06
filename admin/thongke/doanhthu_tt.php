<?php
// Kiểm tra xem đã nhận được dữ liệu từ form hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị năm từ form
    $year = $_POST['year'];

    // Thực hiện thống kê doanh thu dựa trên năm
    $results = thongke_sp_theo_nam($year);

    // Tính tổng doanh thu
    $total_revenue = 0;
    foreach ($results as $row) {
        $total_revenue += (int) $row['doanh_thu'];
    }
} else {
    // Nếu chưa nhận được dữ liệu từ form, thực hiện thống kê mặc định
    $results = thongke_sp_theo_nam(date('Y'));
    $total_revenue = 0;
    // Tính tổng doanh thu
    foreach ($results as $row) {
        $total_revenue += (int) $row['doanh_thu'];
    }
}

$data = [['Tháng', 'Doanh thu', ['role' => 'style']]];
$colors = ['gray', '#76A7FA', 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF',
 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2', '#FF00FF']; // Mảng mã màu mới

if (count($results) > 0) {
    foreach ($results as $index => $row) {
        $data[] = [$row['thang'], (int) $row['doanh_thu'], $colors[$index % count($colors)]];
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

.container {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  height: 100vh;
}

.chart-container {
  width: 70%;
  height: 500px;
  background-color: #fff;
  /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
  border-radius: 4px;
  padding: 20px;
  box-sizing: border-box;
  border-right: 1px solid rgba(0, 0, 0, 0.1);
}

form {
  width: 30%;
  background-color: #fff;
  /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
  border-radius: 4px;
  padding: 20px;
  box-sizing: border-box;
}

h2 {
  margin-top: 0;
  font-size: 24px;
  font-weight: bold;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="number"] {
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
    title: 'Doanh thu theo tháng',
    height: 400,
    legend: {
      position: 'none'
    },
    vAxis: {
      title: 'Doanh thu',
    },
    hAxis: {
      title: 'Tháng',
      format: '0', // Định dạng hiển thị số nguyên
      viewWindow: {
        max: 12
      },
      ticks: data.getColumnRange(0) // Sử dụng các giá trị tháng từ dữ liệu

    }

  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
</script>

<div class="container d-flex flex-row" style="
  background-color: rgb(255, 255, 255);">
  <div class="chart-container" id="chart_div"></div>

  <form method="POST" action="">
    <h2>Tổng doanh thu: <?php echo $total_revenue; ?> VNĐ</h2>
    <label for="year">Năm:</label>
    <input type="number" id="year" name="year" placeholder="2023    " min="2000" max="2099"
      value="<?php echo $year; ?>">

    <div class="row mt-3"><input type="submit" class="col-auto" value="Thống kê">
      <a href="index.php?act=bdngay&page=thongke" class="col-auto"><input class="btn btn-primary mr10 checked"
          type="button" value="Biểu đồ ngày"></a>
      <a href="index.php?act=list&page=thongke" class="col-auto"><input class="btn btn-primary mr10 checked"
          type="button" value="Quay lại"></a>
    </div>
  </form>
</div>