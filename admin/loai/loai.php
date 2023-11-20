<?php
  $dataAll = loai_select_all();

  if (isset($_GET['DTL'])) {
    loai_delete($_GET['DTL']);

    header('Location: index.php?page=loai&act=list');
  }

  $arrID = [];

  function deleteItems()
  {
    foreach ($_POST['check'] as $id) {
      $arrID[] = $id;
    }
    loai_delete_multi($arrID);

    header('Location: index.php?page=loai&act=list');
  }

  function loai_delete_multi($arrID)
  {
    foreach ($arrID as $id) {
      loai_delete($id);
    }
  }

  if (isset($_POST['btnDelete'])) {
    deleteItems();
  }
?>
<form action="" method="post">
  <legend class="text-center mb-4">Danh sách danh mục</legend>

  <div class="container" style="max-width: 90%">
    <div class="row mb10 mt-2">
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 checked" type="button" value="CHỌN TẤT CẢ"></a>
      <a href="#" class="col-auto"><input class="btn btn-primary mr10 unchecked" type="button"
          value="BỎ CHỌN TẤT CẢ"></a>
      <a href="#" class="col-auto"><input class="btn btn-primary mr10" type="submit" name="btnDelete"
          value="XÓA CÁC MỤC ĐÃ CHỌN"></a>
      <a href="index.php?act=edit&page=loai" class="col-auto"> <input class="btn btn-primary mr20" type="button"
          value="NHẬP THÊM"></a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th></th>
          <th scope="col">Mã</th>
          <th scope="col">Tên</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataAll as $key => $value) : ?>
        <tr>
          <td><input type="checkbox" name="check[]" value="<?= $value['id']; ?>" class="check"></td>
          <td><?= $value['id']; ?></td>
          <td><?= $value['ten_dm']; ?></td>
          <td>
            <a href="index.php?DTL=<?= $value['id']; ?>&page=loai&act=list" class="btn btn-danger"
              onclick="confirm('Bạn có muốn xóa hay không?')">
              Xóa
            </a>
            <a href="index.php?idTL=<?= $value['id']; ?>&page=loai&act=edit" class="btn btn-warning"> Sửa </a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</form>

</div>
</div>