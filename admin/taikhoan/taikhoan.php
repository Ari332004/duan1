<?php
  $dataAll = tai_khoan_select_all();
  
  $arrID = [];
  
  function deleteItems()
  {
    foreach ($_POST['check'] as $id) {
      $arrID[] = $id;
    }
  
    hang_hoa_delete_multi($arrID);
  
    header('Location: index.php?act=sanpham');
    
  }
  
  function hang_hoa_delete_multi($arrID)
  {
    foreach ($arrID as $id) {
      tai_khoan_delete($id);
    }
  }
  
  if (isset($_POST['btnDelete'])) {
    deleteItems();
  }
  if (isset($_GET['DTK'])) {
    tai_khoan_delete($_GET['DTK']);
    header('Location: index.php?page=taikhoan&act=list');
  }
?>
<form action="" method="post">
  <legend class="text-center mb-4">Danh sách tài khoản</legend>
  <div class="container" style="max-width: 90%">
    <div class="row mb10 mt-2">
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 checked" type="button" value="CHỌN TẤT CẢ"></a>
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 unchecked" type="button"
          value="BỎ CHỌN TẤT CẢ"></a>
      <a href="#" class="col-auto"><input class="btn btn-primary mr10" type="submit" name="btnDelete"
          value="XÓA CÁC MỤC ĐÃ CHỌN"></a>
      <a href="index.php?act=edit&page=taikhoan" class="col-auto"> <input class="btn btn-primary mr20" type="button"
          value="NHẬP THÊM"></a>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th></th>
          <th scope="col">Mã</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col">Role</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $key => $value) : ?>
        <tr>
          <td><input type="checkbox" name="check[]" value="<?= $value['id']; ?>" class="check"></td>
          <th><?= $value['id']; ?></th>
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
  </div>
</form>
</div>
</div>