<?php
$results = thongke_sp();

$data = [['Ngày', 'Doanh thu']];
foreach ($results as $row) {
    $date = date('Y-m-d', strtotime($row['ngay'])); // Chuyển đổi chuỗi ngày thành dạng 'YYYY-MM-DD'
    $data[] = [$date, $row['doanh_thu']];
}
$dataJson = json_encode($data);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Biểu đồ cột</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo $dataJson; ?>);

            var options = {
                title: 'Biểu đồ cột',
                height: 400,
                bar: {groupWidth: '60%'},
                legend: {position: 'none'}
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
</body>
</html>