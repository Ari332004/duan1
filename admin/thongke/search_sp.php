<?php
  $dataAll = thongke_sp();
  if (isset($_POST['findBtn'])) {
    $name = $_POST['name'] ?? "";
    $ma_sp = $_POST['ma_sp'] ?? 0;

    $dataAll = thongke_sp($ma_sp,$name);
  }
?>
<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4" id="container-form">
    <div class="col-lg-6 col-lg-offset-4">
      <form method="post">
        <legend class="text-center mb-4">Tìm kiếm sản phẩm</legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" placeholder="Mã sản phẩm" name="ma_sp" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Tên sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Tên sản phẩm" name="name" />
          </div>
        </div>

        <button class="btn btn-primary" id="find-btn" name="findBtn">
          Find
        </button>
      </form>
    </div>
  </div>
</div>
<div class="container" style="max-width: 90%">

  <form action="" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Mã</th>
          <th scope="col">Tên</th>
          <th scope="col">Màu</th>
          <th scope="col">Chất liêụ</th>
          <th scope="col">Tổng số lượng</th>
          <th scope="col">Tổng lượt xem</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $key => $value) : ?>
        <tr>
          <td><?= $value['ma_sp']; ?></td>
          <td><?= $value['ten_sp']; ?></td>
          <td><?= $value['ten_mau']; ?></td>
          <td><?= $value['ten_cl']; ?></td>
          <td><?= $value['tong_so_luong']; ?></td>
          <td><?= $value['tong_luot_xem']; ?></td>
          
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </form>
</div>
</div>
</div>