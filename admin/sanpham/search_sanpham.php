<?php
  $dataAll = san_pham_select_all();
  if (isset($_POST['findBtn'])) {
    $name = $_POST['name'] ?? "";
    $mota = $_POST['mota'] ?? "";
    $id = $_POST['id'] ?? 0;
    $loai = $_POST['loai'] ?? 0;
    $dataAll = san_pham_select_all($name,$loai,$id, $mota);
  }
  $dataloai = loai_select_all_sp();
?>
<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4" id="container-form">
    <div class="col-lg-6 col-lg-offset-4">
      <form method="post">
        <legend class="text-center mb-4">Tìm kiếm sản phẩm</legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" placeholder="Mã sản phẩm" name="id" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Tên sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Tên sản phẩm" name="name" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-loai" class="col-sm-3 col-form-label">Loại</label>
          <div class="col-sm-9">
            <select class="form-control" id="input-loai" name="loai">
              <?php foreach($dataloai as $value): ?>
              <option value="<?= $value['id'] ?>">

                <?= $value['ten_dm'] ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-mota" class="col-sm-3 col-form-label">Mô tả</label>
          <div class="col-sm-9">
            <textarea name="mota" class="form-control" id="input-mota" cols="30" rows="5"
              placeholder="Mô tả"></textarea>
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
          <th scope="col">Loại</th>
          <th scope="col">Giá</th>
          <th scope="col">Ngày thêm</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $key => $value) : ?>
        <tr>
          <td><?= $value['id']; ?></td>
          <td><?= $value['ten_sp']; ?></td>
          <td><?= $value['ma_dm']; ?></td>
          <td><?= $value['gia']; ?> VNĐ</td>
          <td><?= $value['ngay_nhap']; ?></td>
          <td>
            <a href="index.php?DSP=<?= $value['id']; ?>&page=sanpham&act=xoa" class="btn btn-danger"
              onclick="return confirm('Bạn có muốn xóa hay không?')">
              Xóa
            </a>
            <a href="index.php?idSP=<?= $value['id']; ?>&page=sanpham&act=edit" class="btn btn-warning"> Sửa </a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </form>
</div>
</div>
</div>