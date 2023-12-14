<?php
  $msg = "";
  $h2 = "THÊM MỚI DANH MỤC";
  $idTL = $_GET['idTL'] ?? "";
  if ($idTL != "") {
    $h2 = "CHỈNH SỬA DANH MỤC";
    $result = loai_select_by_id($idTL);
  } else {
    $result = '';
  }
  if (isset($_POST['submit'])) {
    $name = $_POST['name'] ?? "";
    $id = $_POST['id'] ?? "";
    if ($name != "" && $id != "") {
      if ($idTL != "") {
        $kq = loai_update($id, $name);
        $msg = "Chỉnh sửa thành công";
        $color = "green";
        header('Location: index.php?page=loai&act=list');
      } else {
        $kq = loai_insert($name);
        $msg = "Thêm mới thành công";
        $color = "green";
      }
      header('Location: index.php?page=loai&act=list');
    } else {
      $msg = "Vui lòng nhập đầy đủ thông tin";
      $color = "red";
    }
  }
?>
<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form method="post" action="">
        <legend class="text-center mb-4"><?= $h2 ?></legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã danh mục</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" name="id" value="<?= $result['id'] ?? "AUTO NUMBER" ?>"
              readonly />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Tên danh mục</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Tên danh mục" name="name"
              value="<?= $result['ten_dm'] ?? "" ?>" />
          </div>
        </div>
        <button class="btn btn-primary" i d="submit-btn" name="submit"><?= $idTL ? 'Cập nhật':'Thêm mới' ?></button>
        <input type="reset" class="btn btn-primary" name="nhaplai"></input>
        <a href="index.php?act=list&page=loai" class="btn btn-primary" name="danhsach">Danh sach</a>
        <div class="error-msg" style="color: <?= $color ?>;"><?= $msg ?></div>
      </form>
    </div>
  </div>
</div>
</div>
</div>