<?php
$msg = "";
$h2 = "THÊM MỚI ẢNH";
$idIMG = $_GET['idIMG'] ?? "";
if ($idIMG != "") {
  $h2 = "CHỈNH SỬA ẢNH";
  $result = anh_select_by_id($idIMG);
} else {
  $result = '';
}
if (isset($_POST['submit'])) {
  $ma_sp = $_POST['ma_sp'] ?? "";
  $id = $_POST['id'] ?? "";
  $img_url = $_FILES['img_url']['name'];
  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["img_url"]["name"]);

  if (move_uploaded_file($_FILES["img_url"]["tmp_name"], $target_file)) {
    if ($img_url != "" && $id != "") {
      if ($idIMG != "") {
        $kq = anh_update($id, $img_url, $ma_sp);
        $msg = "Chỉnh sửa thành công";
        $color = "green";
      } else {
        $kq = anh_insert($img_url, $ma_sp);
        $msg = "Thêm mới thành công";
        $color = "green";
      }
    } else {
      $msg = "Vui lòng nhập đầy đủ thông tin";
      $color = "red";
    }
  } else {
    $msg = "Có lỗi xảy ra khi tải lên tệp";
    $color = "red";
  }
}
?>

<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form method="post" action="" enctype="multipart/form-data">
        <legend class="text-center mb-4"><?= $h2 ?></legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã ảnh</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" name="id" value="<?= $result['id'] ?? "AUTO NUMBER" ?>" readonly />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Mã sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Mã Sản phẩm" name="ma_sp" value="<?= $result['ma_sp'] ?? "" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Ảnh cũ</label>
          <div class="col-sm-9">
            <?php if (!empty($result['img_url'])) : ?>
              <img src="../upload/<?= $result['img_url']; ?>" alt="Hình ảnh sản phẩm" width="200"> <br><br>~
            <?php endif; ?>
              
            
          </div>
          <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Ảnh mới</label>
          <div class="col-sm-9">
          <input type="file" class="form-control" id="input-name" placeholder="" name="img_url" />
          </div>
        </div>
        </div>
        <button class="btn btn-primary" id="submit-btn" name="submit"><?= $idIMG ? 'Cập nhật' : 'Thêm mới' ?></button>
        <input type="reset" class="btn btn-primary" name="nhaplai">
        <a href="index.php?act=list&page=anh" class="btn btn-primary" name="danhsach">Danh sách</a>
        <div class="error-msg" style="color: <?= $color ?>;"><?= $msg ?></div>
      </form>
    </div>
  </div>
</div>