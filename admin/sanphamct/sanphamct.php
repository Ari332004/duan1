<?php
$dataAll = select_all_spct();

$arrID = [];

  function deleteItems()
  {
    foreach ($_POST['check'] as $id) {
      $arrID[] = $id;
    }
    loai_delete_multi($arrID);

    header('Location: index.php?page=sanphamct&act=list');
  }

  function loai_delete_multi($arrID)
  {
    foreach ($arrID as $id) {
      spct_delete($id);
    }
  }

  if (isset($_POST['btnDelete'])) {
    deleteItems();
  }
  if (isset($_GET['idspct'])) {
    spct_delete($_GET['idspct']);
    header('Location: index.php?page=sanphamct&act=list');
  }
?>
<form action="" method="post">
  <legend class="text-center mb-4">Kho Sản Phẩm</legend>

  <div class="container" style="max-width: 90%">
    <div class="row mb10 mt-2">
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 checked" type="button" value="CHỌN TẤT CẢ"></a>
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 unchecked" type="button"
          value="BỎ CHỌN TẤT CẢ"></a>
      <a href="index.php?act=list&page=sanphamct" class="col-auto"><input class="btn btn-primary mr10" type="submit"
          name="btnDelete" value="XÓA CÁC MỤC ĐÃ CHỌN"></a>
      <a href="index.php?act=edit&page=sanphamct" class="col-auto"> <input class="btn btn-primary mr20" type="button"
          value="NHẬP THÊM"></a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th></th>
          <th scope="col">Mã Biến thể</th>
          <th scope="col">Mã SP</th>
          <th scope="col">Màu </th>
          <th scope="col">Chất lượng</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Lượt xem</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $spct) {
                    extract($spct);

                ?>

        <tr>
          <td><input type="checkbox" name="check[]" value="<?= $id; ?>" class="check"></td>
          <td><?= $id ?></td>
          <td><?= $ma_sp ?></td>

          <td><?= $ten_mau ?></td>
          <td><?= $ten_cl ?></td>
          <td><?= $so_luong ?></td>
          <td><?= $luot_xem ?></td>
          <td>
            <a href="index.php?idspct=<?=$id?>&page=sanphamct&act=list" class="btn btn-danger"
              onclick="return confirm('Bạn có muốn xóa hay không?')">
              Xóa
            </a>
            <a href="index.php?idspct=<?= $id ?>&page=sanphamct&act=edit" class="btn btn-warning"> Sửa
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</form>

</div>
</div>