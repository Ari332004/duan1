<?php $dataAll = selectall_donhang(); ?>
<form action="" method="post">
  <legend class="text-center mb-4">Danh sách đơn hàng</legend>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Mã DH</th>
        <th scope="col">Tên KH</th>
        <th scope="col">Phone</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Ngày đặt hàng</th>
        <th scope="col">Phương thức TT</th>
        <th scope="col">Trạng thái</th>
        <th style="text-align: center;">Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataAll as $key => $value) : ?>
      <tr>
        <td><?= $value['id']; ?></td>
        <td><?= $value['hovaten']; ?></td>
        <td><?= $value['phone']; ?></td>
        <td><?= $value['dia_tri']; ?> </td>
        <td><?= date("d-m-Y", strtotime($value['ngay_dat_hang'])); ?></td>
        <td><?= $value['pttt']; ?></td>
        <td><?= $value['mota']; ?></td>
        <td style="text-align: center;">
          <a href="index.php?dh=<?= $value['id']; ?>&page=donhang&act=chitietdh" class="btn btn-danger">
            CTDH
          </a>
          <?php if($value['ma_ttdh'] < 4){
            echo '<a href="index.php?idctdh='.$value['id'].'&page=donhang&act=edit" class="btn btn-danger">
            Sửa TT
          </a>';
          }?>


        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  </div>
</form>
</div>
</div>