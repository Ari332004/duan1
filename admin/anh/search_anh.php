<?php
$dataAll = anh_select_all();
if (isset($_POST['findBtn'])) {
  $ten_sp = $_POST['ten_sp'] ?? "";
  $ma_sp = $_POST['ma_sp'] ?? 0;
  $img_url = $_POST['img_url'] ?? "";
  $dataAll = anh_select_all($ten_sp, $ma_sp, $img_url);
}
?>

<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form action="" method="post" enctype="multipart/form-data">
        <legend class="text-center">Tìm kiếm ảnh</legend>
        <div class="form-group row mb-3">
          <label for="ma_sp" class="col-sm-3 col-form-label">Mã Sản Phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="ma_sp" name="ma_sp" value="" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="ten_sp" class="col-sm-3 col-form-label">Tên sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="ten_sp" name="ten_sp" value="" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="img_url" class="col-sm-3 col-form-label">Ảnh</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" id="img_url" name="img_url" value="" />
          </div>
        </div>
        <button type="submit" class="btn btn-primary" id="find-btn" name="findBtn">Find</button>
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
          <th scope="col">Mã_SP</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $value) : ?>
          <tr>
            <th scope="row"><?= $value['id']; ?></th>
            <td><?= $value['ma_sp']; ?></td>
            <td><?= $value['ten_sp']; ?></td>
            <td><img src="../upload/<?= $value['img_url']; ?>" alt="Hình ảnh sản phẩm" width="200"></td>
            <td>
              <a href="index.php?DIMG=<?= $value['id']; ?>&page=anh&act=xoa" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa hay không?')">Xóa</a>
              <a href="index.php?idIMG=<?= $value['id']; ?>&page=anh&act=edit" class="btn btn-warning">Sửa</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </form>
</div>