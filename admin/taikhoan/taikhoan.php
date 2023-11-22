<?php
  $dataAll = tai_khoan_select_all();

  
  
  // $dataloai = loai_select_all_sp();
  // // Thêm biến arrID để lưu trữ các ID của các mục đã chọn.
  // $arrID = [];
  
  // // Thêm hàm deleteItems() để thực hiện việc xóa các mục đã chọn.

  // function deleteItems()
  // {
  //   // Lấy tất cả các ID của các mục đã chọn.
  //   foreach ($_POST['check'] as $id) {
  //     $arrID[] = $id;
  //   }
  
  //   // Xóa các mục đã chọn khỏi cơ sở dữ liệu.
  //   hang_hoa_delete_multi($arrID);
  
  //   header('Location: index.php?act=sanpham');
    
  // }
  
  // // Sửa đổi hàm loai_delete() để chấp nhận một mảng các ID làm tham số.
  // function hang_hoa_delete_multi($arrID)
  // {
  //   // Xóa từng mục khỏi cơ sở dữ liệu.
  //   foreach ($arrID as $id) {
  //     san_pham_delete($id);
  //   }
  // }
  
  // // Thêm một sự kiện click cho nút `XÓA CÁC MỤC ĐÃ CHỌN` để gọi hàm `deleteItems()`.
  // if (isset($_POST['btnDelete'])) {
  //   deleteItems();
  // }
?>
<form action="" method="post">
  <legend class="text-center mb-4">Danh sách tài khoản</legend>
  <div class="container" style="max-width: 90%">
    <!-- <div class="row mb10 mt-2">
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 checked" type="button" value="CHỌN TẤT CẢ"></a>
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 unchecked" type="button"
          value="BỎ CHỌN TẤT CẢ"></a>
      <a href="#" class="col-auto"><input class="btn btn-primary mr10" type="submit" name="btnDelete"
          value="XÓA CÁC MỤC ĐÃ CHỌN"></a> -->
      <a href="index.php?act=edit&page=taikhoan" class="col-auto"> <input class="btn btn-primary mr20" type="button"
          value="NHẬP THÊM"></a>
    </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Mã</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
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
        <th scope="row"><?= $value['id']; ?></th>
        <td><?= $value['username']; ?></td>
        <td><?= $value['password']; ?></td>
        <td><?= $value['email']; ?></td>
        <td><?= $value['sdt']; ?></td>
        <td><?= $value['dia_tri']; ?></td>
        <td><?= $value['vai_tro']; ?></td>
        
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