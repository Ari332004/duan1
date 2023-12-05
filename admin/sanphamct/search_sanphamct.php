<?php

$dataAll = select_all_spct();
if (isset($_POST['find'])) {
    $id = $_POST['ma_sp'] ?? 0;
    $ten_mau = $_POST['ten_mau'] ?? "";
    $ten_cl = $_POST['ten_cl'] ?? "";
    $so_luong = $_POST['so_luong'] ?? 0;
    $luot_xem = $_POST['luot_xem'] ?? 0;

    $dataAll = select_all_spct($id, $ten_mau, $ten_cl, $so_luong,$luot_xem);
}


$datamau = select_mau(0);
$datacl = select_cl(0);
if (isset($_GET['idspct'])) {
  spct_delete($_GET['idspct']);
  header('Location: index.php?page=sanphamct&act=search');
}
?>

<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form action="" method="post">
        <legend class=" text-center">Tìm kiếm sản phẩm chi tiết</legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã sản phẩm </label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="ma_sp" id="ma_sp" placeholder="Mã sản phẩm " />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-loai" class="col-sm-3 col-form-label">Màu</label>
          <div class="col-sm-9">
            <select class="form-control" id="input-SPCT" name="ten_mau">
              <option value="0">Chọn màu</option>
              <?php foreach ($datamau as $value) : ?>

              <option value="<?= $value['id'] ?>"><?= $value['ten_mau'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-loai" class="col-sm-3 col-form-label">Chất liệu</label>
          <div class="col-sm-9">
            <select class="form-control" id="input-SPCT" name="ten_cl">

              <option value="0">Chọn chất liệu</option>
              <?php foreach ($datacl as $value) : ?>

              <option value="<?= $value['id'] ?>"><?= $value['ten_cl'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label">Số lượng</label>
          <div class="col-sm-9"><input type="text" class="form-control" id="so_luong" name="so_luong"
              placeholder="Số lượng"></div>


        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label">Lượt xem</label>
          <div class="col-sm-9"><input type="text" class="form-control" id="luot_xem" name="luot_xem"
              placeholder="Số lượng"></div>


        </div>
        <button type="submit" class="btn btn-primary" id="find-btn" name="find" value="Tìm kiếm">Tìm
          kiếm</button>
      </form>
      </form>
    </div>
  </div>
</div>
<div class="container" style="max-width: 90%">
  <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
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
        <td></td>
        <td><?= $ma_sp ?></td>

        <td><?= $ten_mau ?></td>
        <td><?= $ten_cl ?></td>
        <td><?= $so_luong ?></td>
        <td><?= $luot_xem ?></td>
        <td>
          <a href="index.php?idspct=<?= $id ?>&page=sanphamct&act=search" class="btn btn-danger"
            onclick="return confirm('Bạn có muốn xóa hay không?')">
            Xóa
          </a>
          <a href="index.php?idspct=<?=$id?>&page=sanphamct&act=edit" class="btn btn-warning"> Sửa
          </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>