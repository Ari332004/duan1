<?php $dataAll = selectall_ctdh($_GET['dh']); ?>
<form action="" method="post" enctype="multipart/form-data">
  <legend class="text-center mb-4">Chi tiết đơn hàng</legend>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Mã</th>
        <th scope="col">Ảnh sản phẩm</th>
        <th scope="col">Tên Sản phẩm</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>

        <th> </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataAll as $key => $value) : ?>
      <?php $mauCL = getMauCl($value['ma_spct']) ?>
      <tr>
        <td><?= $value['id']; ?></td>
        <td><img src="../uploads/sanpham/<?=$value['anh']?>" style="border: 1px solid gray;" alt="Hình ảnh sản phẩm"
            width="75"></td>
        <td>
          <div class="d-flex flex-column"><?= $value['ten']; ?><span><?= 'Màu: '. $mauCL['ten_mau']?></span>
            <span><?= 'Chất liệu: '.$mauCL['ten_cl']?></span>
          </div>
        </td>
        <td><?= number_format($value['gia'], 0, '', ','); ?>₫</td>
        <td>x<?= $value['so_luong']; ?> </td>


      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  </div>
</form>
</div>
</div>