<?php
  $msg = "";
  $h2 = "THÊM MỚI SẢN PHẨM";
  $idSP = $_GET['idSP'] ?? "";
  if ($idSP != "") {
    $h2 = "CHỈNH SỬA SẢN PHẨM";
    $result = san_pham_select_by_id($idSP);
  } else {
    $result = '';
  }
  $dataloai = loai_select_all_sp();
  if (isset($_POST['submit'])) {
    $name = $_POST['tensp'] ?? "";
    $id = $_POST['idsp'] ?? "";
    $price = $_POST['gia'] ?? "";
    $iddm = $_POST['loai'] ?? "";
    $mota = $_POST['mota'] ?? "";
    if ($name != "" && $price != "") {
      if ($idSP != "") {
        san_pham_update($idSP, $name, $iddm, $price, $mota);
        $msg = "Chỉnh sửa thành công";
        $color = "green";
      } else {
        san_pham_insert($name,$iddm, $price,$mota);
        $msg = "Thêm mới thành công";
        $color = "green";
      }
    } else {
      $msg = "Vui lòng nhập đầy đủ thông tin";
      $color = "red";
    }
  }
?>
<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4" id="container-form">
    <div class="col-lg-6 col-lg-offset-4">
      <form method="post" action="">
        <legend class="text-center mb-4"><?= $h2 ?></legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" disabled name="idsp"
              value="<?= $result['id'] ?? "AUTO NUMBER" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Tên sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Tên sản phẩm" name="tensp"
              value="<?= $result['ten_sp'] ?? "" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-loai" class="col-sm-3 col-form-label">Loại</label>
          <div class="col-sm-3">
            <select class="form-control" id="input-loai" name="loai">
              <?php foreach($dataloai as $value): ?>
              <option value="<?= $value['id'] ?>" <?php if($result): ?>
                <?= ($result['ma_dm'] == $value['id']) ? 'selected' : '' ?> <?php endif; ?>>

                <?= $value['ten_dm'] ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>

          <label for="input-gia" class="col-sm-3 col-form-label" style="text-align: right">Giá</label>
          <div class="col-sm-3">
            <input type="number" class="form-control" id="input-gia" placeholder="Giá" name="gia"
              value="<?= $result['gia'] ?? "" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-mota" class="col-sm-3 col-form-label">Mô tả</label>
          <div class="col-sm-9">
            <textarea name="mota" class="form-control" id="input-mota" cols="30" rows="5"
              placeholder="Mô tả"><?= $result['mota'] ?? "" ?></textarea>
          </div>
        </div>
        <button class="btn btn-primary" id="submit-btn" name="submit">Thêm mới</button>
        <input type="reset" class="btn btn-primary" name="nhaplai"></input>
        <a href="index.php?act=list&page=sanpham" class="btn btn-primary" name="danhsach">Danh sach</a>
        <div class="error-msg" style="color: <?= $color ?>;"><?= $msg ?></div>
      </form>
    </div>
  </div>
</div>
</div>
</div>