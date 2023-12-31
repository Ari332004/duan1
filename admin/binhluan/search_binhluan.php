<?php
$dataAll = loadall_binhluan(0);
if (isset($_POST['find'])) {
    $id=$_POST['id']?? 0;
    $noi_dung = $_POST['noi_dung'] ?? "";
    $tt = $_POST['trangthai'] ?? false;
    $ma_user = $_POST['ma_user'] ?? 0;
    $ma_sp = $_POST['ma_sp'] ?? 0;

    $dataAll = binhluan_select_all($id,$noi_dung, $ma_user, $ma_sp,$tt);
}
if (isset($_GET['status'])) {
  upStatus($_GET['status']);
  header('Location: index.php?page=binhluan&act=search');
}
if (isset($_GET['idBL'])) {
  binhluan_delete($_GET['idBL']);
  header('Location: index.php?page=binhluan&act=search');
}
?>
<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form action="" method="post">
        <legend class=" text-center">Tìm kiếm bình luận</legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã BL</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="ma_user" id="ma_user" placeholder="Mã tài khoản" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="ma_user" class="col-sm-3 col-form-label">Mã KH </label>
          <div class="col-sm-9"><input type="text" class="form-control" id="ma_user" name="ma_user"
              placeholder="Tên tài khoản"></div>
        </div>
        <div class="form-group row mb-3">
          <label for="username" class="col-sm-3 col-form-label">Mã sản phẩm</label>
          <div class="col-sm-3"><input type="text" class="form-control" id="ma_sp" name="ma_sp"
              placeholder="Mã sản phẩm"></div>
          <label for="trangthai" class="col-sm-3 col-form-label" style="text-align: right">Trạng thái</label>
          <div class="col-sm-3">
            <select name="trangthai" class="form-control" id="trangthai">
              <option value="">Tất cả</option>
              <option value="0">Chưa duyệt</option>
              <option value="1">Đã duyệt</option>
            </select>
          </div>
        </div>

        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label">Nội dung</label>
          <div class="col-sm-9"><input type="text" class="form-control" id="noi_dung" name="noi_dung"
              placeholder="Nội dung"></div>


        </div>
        <button type="submit" class="btn btn-primary" id="find-btn" name="find" value="Tìm kiếm">Find</button>
      </form>
      </form>
    </div>
  </div>
</div>
<div class="container" style="max-width: 90%">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Mã tài khoản </th>
        <th scope="col">Nội dung </th>
        <th scope="col">Mã KH</th>
        <th scope="col">Mã SP</th>
        <th scope="col">Ngày bình luận</th>

        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php foreach ($dataAll as $key => $value) : ?>
      <tr>
        <th scope="row"><?= $value['id']; ?></th>
        <td><?= $value['noi_dung']; ?></td>
        <td><?= $value['ma_user']; ?></td>
        <td><?= $value['ma_sp']; ?></td>
        <td><?= $value['ngay_bl']; ?></td>

        <td style="text-align: center;">
          <?php if($value['trang_thai'] == 0): ?>
          <a href="index.php?status=<?= $id ?>&page=binhluan&act=search" class="btn btn-success"
            onclick="return confirm('Bạn có duyệt bình luận này không?')">
            Duyệt
          </a>
          <?php endif ?>
          <a href="index.php?idBL=<?= $id ?>&page=binhluan&act=search" class="btn btn-danger"
            onclick="return confirm('Bạn có muốn xóa hay không?')">
            Xóa
          </a>


        </td>
      </tr>
      <?php endforeach ?>

      </tr>
    </tbody>
  </table>
</div>
</div>
</div>