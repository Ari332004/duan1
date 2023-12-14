<?php
  $dataAll = thongke_spct();
  
?>

<form action="" method="post">
  <legend class="text-center mb-4">Sản phẩm bán chạy</legend>

  <div class="container" style="max-width: 90%">
    <a href="index.php?act=bdngay&page=thongke" class="col-auto"><input class="btn btn-primary mr10 checked"
        type="button" value="Biểu đồ"></a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Mã</th>
          <th scope="col">Tên</th>
          <th scope="col">Màu</th>
          <th scope="col">SL đã bán</th>
          <th scope="col">Tỉ lệ bán</th>
          <th scope="col">Tổng doanh thu</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $key => $value) : ?>
        <tr>
          <!-- <td><input type="checkbox" name="check[]" value="<?= $value['id']; ?>" class="check"></td> -->
          <td><?= $value['ma_sp']; ?></td>
          <td><?= $value['ten_sp']; ?></td>
          <td><?= $value['ten_mau']; ?></td>
          <td><?= $value['so_luong_da_ban']; ?></td>
          <td><?= $value['ti_le_ban']; ?></td>
          <td><?= number_format($value['tong_tien_ban'], 0, '', ',');  ?>₫</td>


        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</form>
</div>
</div>