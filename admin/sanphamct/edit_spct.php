<?php
$msg = "";
$h2 = "THÊM MỚI SẢN PHẨM BIẾN THỂ";
$idspct = $_GET['idspct'] ?? "";
if ($idspct != "") {
    $h2 = "CHỈNH SỬA SẢN PHẨM BIẾN THỂ";
    $result = spct_select_by_id($idspct);
} else {
    $result = '';
}
$datamau = select_mau();
$datacl = select_cl();
if (isset($_POST['submit'])) {
    $ma_sp = $_POST['ma_sp'] ?? "";
    $ten_mau = $_POST['ten_mau'] ?? "";
    $ten_cl = $_POST['ten_cl'] ?? "";
    $so_luong = $_POST['so_luong'] ?? "";
    if ($ma_sp != "" && $ten_cl != "" && $ten_mau != "" && $so_luong != "") {
        
        if(!empty(san_pham_select_by_id($ma_sp))){
          if ($idspct != "") {
            spct_update($idspct, $ma_sp, $ten_mau, $ten_cl, $so_luong);
            $msg = "Chỉnh sửa thành công";
            $color = "green";
            header('Location: index.php?page=sanphamct&act=list');
          } else {
            spct_insert($ma_sp, $ten_mau, $ten_cl, $so_luong);
            $msg = "Thêm mới thành công";
            $color = "green";
          }
        } else {
          $msg = "Không tồn tại mã sản phẩm";
          $color = "red";
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
          <label for="id" class="col-sm-3 col-form-label">Mã biến thể</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" disabled name="idspct"
              value="<?= $result['id'] ?? "AUTO NUMBER" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã Sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" name="ma_sp" value="<?= $result['ma_sp'] ?? "" ?>"
              placeholder="Mã sản phẩm" />
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="input-mau" class="col-sm-3 col-form-label">Màu</label>
          <div class="col-sm-3">
            <select class="form-control" id="input-mau" name="ten_mau">
              <?php foreach ($datamau as $value) : ?>
              <option value="<?= $value['id'] ?>" <?php if ($result) : ?>
                <?= ($result['id'] == $value['id']) ? 'selected' : '' ?> <?php endif; ?>>

                <?= $value['ten_mau'] ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>
          <label for="input-mau" class="col-sm-3 col-form-label" style="text-align: right;">Chất liệu</label>
          <div class="col-sm-3">
            <select class="form-control" id="input-mau" name="ten_cl">
              <?php foreach ($datacl as $value) : ?>
              <option value="<?= $value['id'] ?>" <?php if ($result) : ?>
                <?= ($result['id'] == $value['id']) ? 'selected' : '' ?> <?php endif; ?>>

                <?= $value['ten_cl'] ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>

        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Số lượng</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Số lượng" name="so_luong"
              value="<?= $result['so_luong'] ?? "" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Lượt xem</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Lượt xem" name="luot_xem" disabled
              value="<?= $result['luot_xem'] ?? "" ?>" />
          </div>
        </div>
        <button class="btn btn-primary" id="submit-btn" name="submit"><?= $idspct ? 'Cập nhật' : 'Thêm mới' ?></button>
        <input type="reset" class="btn btn-primary" name="nhaplai"></input>
        <a href="index.php?act=list&page=sanphamct" class="btn btn-primary" name="danhsach">Danh sách</a>
        <div class="error-msg" style="color: <?= $color ?>;"><?= $msg ?></div>
      </form>
    </div>
  </div>
</div>
</div>
</div>