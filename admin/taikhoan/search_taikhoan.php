<?php
  $dataAll = tai_khoan_select_all();
  if (isset($_POST['findBtn'])) {
    $username = $_POST['username'] ?? "";
    $email = $_POST['email'] ?? "";
    $id = $_POST['id'] ?? 0;
    $dia_tri = $_POST['dia_tri'] ?? "";
    $vai_tro = $_POST['inlineRadioOptions'] ?? "";
    $sdt = $_POST['sdt'] ?? "";
    $dataAll = tai_khoan_select_all($username,$id,$email, $dia_tri,$sdt,$vai_tro);
  }
?>
<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form action="" method="post" enctype="multipart/form-data">
        <legend class="text-center">Tìm kiếm tài khoản</legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã tài khoản</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" name="id" value="" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="username" class="col-sm-3 col-form-label">Tên đăng nhập</label>
          <div class="col-sm-9"><input type="text" class="form-control" id="username" name="username"
              placeholder="Tên đăng nhập"></div>
        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label" for="email">Email</label>
          <div class="col-sm-9"><input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label" for="phone">Số điện thoại</label>
          <div class="col-sm-9"><input type="text" class="form-control" id="phone" name="sdt"
              placeholder="Số điện thoại"></div>

        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label">Vai trò</label>
          <div class="col-sm-9">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptions" value="1">
              <label for="inlineRadio1">Nhân viên</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioOptions" value="0">
              <label for="inlineRadio2">Khách hàng</label>
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label" for="address">Địa chỉ</label>
          <div class="col-sm-9">
            <textarea name="dia_tri" class="form-control" id="dia_tri" cols="30" rows="5"
              placeholder="Nhập địa chỉ"></textarea>
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
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">SĐT</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Vai trò</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $key => $value) : ?>
        <tr>
          <th scope="row"><?= $value['id']; ?></th>
          <td><?= $value['username']; ?></td>
          <td><?= $value['email']; ?></td>
          <td><?= $value['sdt']; ?></td>
          <td><?= $value['dia_tri']; ?></td>
          <td><?= $value['vai_tro'] == 0?'Khách hàng':'Nhân viên'; ?></td>
          <td>
            <a href="index.php?DTK=<?= $value['id']; ?>&page=taikhoan&act=xoa" class="btn btn-danger"
              onclick="return confirm('Bạn có muốn xóa hay không?')">
              Xóa
            </a>
            <a href="index.php?idTK=<?= $value['id']; ?>&page=taikhoan&act=edit" class="btn btn-warning"> Sửa </a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </form>
</div>
</div>
</div>