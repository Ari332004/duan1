<?php
$dataAll = binh_luan_select_by_khach_hang($_GET['idSP']);
$dataRate = rate_sanpham($_GET['idSP']);

  if (isset($_GET['status'])) {
    upStatus($_GET['status']);
    header('Location: index.php?page=thongke&act=chitietbinhluan&idSP='.$_GET['idSP'].'&tensp='.$_GET['tensp']);
  }
  if (isset($_GET['idBL'])) {
    binhluan_delete($_GET['idBL']);
    header('Location: index.php?page=thongke&act=chitietbinhluan&idSP='.$_GET['idSP'].'&tensp='.$_GET['tensp']);
  }
?>
<form action="" method="post">

  <div class="container" style="max-width: 90%">
    <legend class="mb-4">Sản Phẩm: <?= $_GET['tensp']?></legend>
    <!-- <div class="row mb10 mt-2 mb-3">
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 checked" type="button" value="Xem biểu đồ"></a>

    </div> -->
    <div class="row2">
      <div class="row2 form_content ">
        <div id="myChart" style="width:100%; width:600px; height:250px; align-items: center">
        </div>

        <script>
        google.charts.load('current', {
          'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          // Set Data
          const data = google.visualization.arrayToDataTable([
            ['Contry', 'Mhl'],
            <?php
            foreach($dataRate as $key => $data){
              echo "['".$data['id']."sao (".$data['rate_description'].")', ".$data['count']."],";
            };
          ?>
          ]);

          // Set Options
          const options = {
            title: 'BIỂU ĐỒ ĐÁNH GIÁ CHẤT LƯỢNG SẢN PHẨM',
            is3D: true
          };

          // Draw
          const chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);

        }
        </script>

      </div>
    </div>
    <table class="table table-striped mt-5">
      <thead>
        <tr>
          <th>NỘI DUNG</th>
          <th>NGÀY BÌNH LUẬN</th>
          <th>NGƯỜI BÌNH LUẬN</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $binhluan) {
                    extract($binhluan);

                ?>

        <tr>
          <td><?= $noi_dung ?></td>
          <td><?= $ngay_bl ?></td>
          <td><?= $username ?></td>
          <td style="text-align: center;">
            <?php if($trang_thai == 0): ?>
            <a href="index.php?status=<?= $id ?>&page=thongke&act=chitietbinhluan&idSP=<?= $_GET['idSP'] ?>"
              class="btn btn-success" onclick="return confirm('Bạn có duyệt bình luận này không?')">
              Duyệt
            </a>
            <?php endif ?>
            <a href="index.php?idBL=<?= $id ?>&page=thongke&act=chitietbinhluan&idSP=<?= $_GET['idSP'] ?>"
              class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa hay không?')">
              Xóa
            </a>

          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</form>
</div>
</div>