<?php
  $dataAll = selectall_donhang();
  $dataloai = selectall_trangthaidh();
  if (isset($_POST['find'])) {
    $ttdh = $_POST['ma_ttdh'] ?? 0;
    $id = $_POST['madh'] ?? 0;
    $idkh = $_POST['makh'] ?? 0;
    $dataAll = find_donhang($id, $idkh, $ttdh);
  }
?>
<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form method="post">
        <legend class="text-center mb-4">Tìm kiếm đơn hàng</legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-4 col-form-label">Mã đơn hàng</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="id" name="madh" placeholder="Nhập mã đơn hàng" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="kh" class="col-sm-4 col-form-label">Mã KH</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="kh" name="makh" placeholder="Nhập mã Khách hàng" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-loai" class="col-sm-4 col-form-label">Trạng thái đơn hàng</label>
          <div class="col-sm-8">
            <select class="form-control" id="input-loai" name="ma_ttdh">
              <option value="0">Chọn trạng thái</option>
              <?php foreach ($dataloai as $value) : ?>
              <option value="<?= $value['id'] ?>">
                <?= $value['mota'] ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>


        </div>
        <button class="btn btn-primary" id="find-btn" name="find">Tìm kiếm</button>
      </form>
    </div>
  </div>
</div>
<div class="container" style="max-width: 100%">
  <form action="" method="post">
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
</div>