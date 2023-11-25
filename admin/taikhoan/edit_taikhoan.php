<?php
  $msg = "";
  $h2 = "THÊM MỚI TÀI KHOẢN";
  $idTK = $_GET['idTK'] ?? "";
  if ($idTK != "") {
    $h2 = "CHỈNH SỬA TÀI KHOẢN";
    $result = tai_khoan_select_by_id($idTK);
  } else {
    $result = '';
  }
  if (isset($_POST['submit'])) {
    $name = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";
    $email = $_POST['email'] ?? "";
    $hinh = $_POST['hinh'] ?? "";
    $vai_tro = $_POST['vai_tro'] ?? "";
    $phone = $_POST['phone'] ?? "";
    $dia_tri = $_POST['dia_tri'] ?? "";
    if ($name != "" && $password != "") {
      if ($idTK != "") {
        tai_khoan_update($idTK, $password, $name, $email,$hinh, $vai_tro, $phone, $dia_tri);
        $msg = "Chỉnh sửa tài khoản thành công";
        $color = "green";
      } else {
        tai_khoan_insert($password, $name, $email, $hinh, $vai_tro, $phone,$dia_tri);
        $msg = "Thêm mới tài khoản thành công";
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
      <form method="post" action="" enctype="multipart/form-data">
        <legend class="text-center mb-4"><?= $h2 ?></legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã tài khoản</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" disabled name="idsp"
              value="<?= $result['id'] ?? "AUTO NUMBER" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Tên đăng nhập</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Tên đăng nhập" name="username"
              value="<?= $result['username'] ?? "" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-password" class="col-sm-3 col-form-label">Mật khẩu</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="input-password" placeholder="Mật khẩu" name="password"
              value="<?= $result['password'] ?? "" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-email" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="input-email" placeholder="Email" name="email"
              value="<?= $result['email'] ?? "" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label">Vai trò</label>
          <div class="col-sm-9">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vai_tro" id="inlineRadio1" value="1"
                <?php if (isset($result['vai_tro']) && $result['vai_tro'] == 1) echo "checked"; ?>>
              <label for="inlineRadio1">Nhân viên</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vai_tro" id="inlineRadio2" value="0"
                <?php if (isset($result['vai_tro']) && $result['vai_tro'] == 0) echo "checked"; ?>>
              <label for="inlineRadio2">Khách hàng</label>
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label" for="image">Ảnh</label>
          <div class="col-sm-9"><input type="file" class="form-control-file" id="image" name="image"></div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-phone" class="col-sm-3 col-form-label">Số điện thoại</label>
          <div class="col-sm-9">
            <input type="tel" class="form-control" id="input-phone" placeholder="Số điện thoại" name="phone"
              value="<?= $result['sdt'] ?? "" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-dia_tri" class="col-sm-3 col-form-label">Địa chỉ</label>
          <div class="col-sm-9">
            <textarea name="dia_tri" class="form-control" id="input-dia_tri" cols="30" rows="5"
              placeholder="Địa chỉ"><?= $result['dia_tri'] ?? "" ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12 text-center">
            <button class="btn btn-primary" id="submit-btn" name="submit"><?= $idTK ? 'Cập nhật':'Thêm mới' ?></button>
            <input type="reset" class="btn btn-primary" name="nhaplai"></input>
            <a href="index.php?act=list&page=taikhoan" class="btn btn-primary" name="danhsach">Danh sách</a>
          </div>
        </div>
      </form>
      <?php if ($msg != "") : ?>
      <div class="alert alert-<?= $color ?>" role="alert">
        <?= $msg ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>