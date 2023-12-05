<?php
  $dataAll = thongke_spct();

  
  
  $dataloai = loai_select_all_sp();
  // Thêm biến arrID để lưu trữ các ID của các mục đã chọn.
  $arrID = [];
  
  // Thêm hàm deleteItems() để thực hiện việc xóa các mục đã chọn.

  function deleteItems()
  {
    // Lấy tất cả các ID của các mục đã chọn.
    foreach ($_POST['check'] as $id) {
      $arrID[] = $id;
    }
  
    // Xóa các mục đã chọn khỏi cơ sở dữ liệu.
    hang_hoa_delete_multi($arrID);
  
    header('Location: index.php?act=sanpham');
    
  }
  
  // Sửa đổi hàm loai_delete() để chấp nhận một mảng các ID làm tham số.
  function hang_hoa_delete_multi($arrID)
  {
    // Xóa từng mục khỏi cơ sở dữ liệu.
    foreach ($arrID as $id) {
      san_pham_delete($id);
    }
  }
  
  // Thêm một sự kiện click cho nút `XÓA CÁC MỤC ĐÃ CHỌN` để gọi hàm `deleteItems()`.
  if (isset($_POST['btnDelete'])) {
    deleteItems();
  }
?>
 
<form action="" method="post">
  <legend class="text-center mb-4">Sản phẩm bán chạy</legend>
  <a href="index.php?act=list&page=thongke" class="col-auto"><input class="btn btn-primary mr10 checked" type="button" value="Biểu đồ"></a>
  <div class="container" style="max-width: 90%">
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Mã</th>
          <th scope="col">Tên</th>
          <th scope="col">Màu</th>
          <th scope="col">Số lượng trong kho</th>
          <th scope="col">Số lượng đã bán</th>
          <th scope="col">Số lượng còn lại</th>
          <th scope="col">Tỉ lệ bán</th>
          <th scope="col">Tổng doanh thu</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $key => $value) : ?>
        <tr>
          <!-- <td><input type="checkbox" name="check[]" value="<?= $value['id']; ?>" class="check"></td> -->
          <td><?= $value['ma_sp']; ?></td>
          <td><?= $value['ten_sp']; ?></td>
          <td><?= $value['ten_mau']; ?></td>
          <td><?= $value['tong_so_luong']; ?></td>
          <td><?= $value['so_luong_da_ban']; ?></td>
          <td><?= $value['so_luong_con_lai']; ?></td>
          <td><?= $value['ti_le_ban']; ?></td>
          <td><?= $value['tong_tien_ban'];  ?> VNĐ</td>
          
          
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</form>
</div>
</div>