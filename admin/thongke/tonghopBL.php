<?php
$dataAll = binh_luan_select_by_hang_hoa();


  if (isset($_GET['status'])) {
    upStatus($_GET['status']);
    header('Location: index.php?page=binhluan&act=list');
  }
?>
<form action="" method="post">
  <legend class="text-center mb-4">Tổng hợp bình luận</legend>

  <div class="container" style="max-width: 90%">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>SẢN PHẨM</th>
          <th>SỐ BL</th>
          <th>MỚI NHẤT</th>
          <th>CŨ NHẤT</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $binhluan) {
                    extract($binhluan);

                ?>

        <tr>
          <td><?= $ten ?></td>
          <td><?= $soluong ?></td>
          <td><?= $moi ?></td>
          <td><?= $cu ?></td>
          <td>
            <a href="index.php?tensp=<?= $ten; ?>&idSP=<?= $id; ?>&act=chitietbinhluan&page=thongke"
              class="btn btn-secondary">
              Xem chi tiết
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