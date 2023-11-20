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
        <tr>
          <td><input type="checkbox" name="check[]" value="<?= $value['id']; ?>" class="check"></td>
          <th scope="row">1</th>
          <td>ab</td>
          <td>
            <a class="btn btn-danger">
              Xóa
            </a>
            <a class="btn btn-warning"> Sửa </a>
          </td>
        </tr>
        <tr>
          <td><input type="checkbox" name="check[]" value="<?= $value['id']; ?>" class="check"></td>
          <th scope="row">2</th>
          <td>ab</td>
          <td>
            <a class="btn btn-danger">
              Xóa
            </a>
            <a class="btn btn-warning"> Sửa </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</form>

</div>
</div>