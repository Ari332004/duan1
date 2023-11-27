<?php
  $dataAll = anh_select_all();



  // Thêm biến arrID để lưu trữ các ID của các mục đã chọn.
  $arrID = [];

  // Thêm hàm deleteItems() để thực hiện việc xóa các mục đã chọn.

  function deleteItemsA()
  {
    // Lấy tất cả các ID của các mục đã chọn.
    foreach ($_POST['check'] as $id) {
      $arrID[] = $id;
    }

    // Xóa các mục đã chọn khỏi cơ sở dữ liệu.
    hang_hoa_delete_multi($arrID);

    header('Location: index.php?act=anh');

  }

  // Sửa đổi hàm loai_delete() để chấp nhận một mảng các ID làm tham số.
  function hang_hoa_delete_multi($arrID)
  {
    // Xóa từng mục khỏi cơ sở dữ liệu.
    foreach ($arrID as $id) {
      anh_delete($id);
    }
  }

  // Thêm một sự kiện click cho nút `XÓA CÁC MỤC ĐÃ CHỌN` để gọi hàm `deleteItems()`.
  if (isset($_POST['btnDelete'])) {
    deleteItemsA();
  }
?>
<form action="" method="post">
  <legend class="text-center mb-4">Danh sách ảnh sản phẩm</legend>
  <div class="container" style="max-width: 90%">
    <div class="row mb10 mt-2">
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 checked" type="button" value="CHỌN TẤT CẢ"></a>
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 unchecked" type="button"
          value="BỎ CHỌN TẤT CẢ"></a>
      <a href="#" class="col-auto"><input class="btn btn-primary mr10" type="submit" name="btnDelete"
          value="XÓA CÁC MỤC ĐÃ CHỌN"></a>
      <a href="index.php?act=edit&page=anh" class="col-auto"> <input class="btn btn-primary mr20" type="button"
          value="NHẬP THÊM"></a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th></th>
          <th scope="col">Mã_SP</th>
          <th scope="col">Tên</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $key => $value) : ?>
        <tr>
          <td><input type="checkbox" name="check[]" value="<?= $value['id']; ?>" class="check"></td>
          <td><?= $value['ma_sp']; ?></td>
          <td><?= $value['ten_sp']; ?></td>
          <td><img src="../uploads/sanpham/<?= $value['img_url']; ?>" style="border: 1px solid gray;"
              alt="Hình ảnh sản phẩm" width="75"></td>
          <td>
            <a href="index.php?DIMG=<?= $value['maanh']; ?>&page=anh&act=xoa" class="btn btn-danger"
              onclick="return confirm('Bạn có muốn xóa hay không?')">
              Xóa
            </a>
            <a href="index.php?idIMG=<?= $value['maanh']; ?>&page=anh&act=edit" class="btn btn-warning"> Sửa </a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</form>
</div>
</div>