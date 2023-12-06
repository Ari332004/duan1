<?php

$msg = "";

$idctdh = $_GET['idctdh'] ?? "";
$color = "green";
$h2 = "CHỈNH SỬA THỂ LOẠI";
$result = select_trangthai_by_id($idctdh);
$dataloai = selectall_trangthaidh();
if (isset($_POST['submit'])) {
    $ma_ttdh = $_POST['ma_ttdh'] ?? "";
    $id = $_POST['madh'] ?? "";

    if ($ma_ttdh != "") {

        ctdh_update($result['ctdh'], $ma_ttdh);
    }
}
?>
<div class="tab-content">
  <div class="tab-pane active" id="">
    &nbsp;
    <div class="container col-8 m-auto">
      <h2 class="py-2 text-center h4 "><?= $h2 ?></h2>
      <form method="post" action="">
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã đơn hàng</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" disabled name="madh" value="<?= $result['ctdh'] ?? "" ?>" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-loai" class="col-sm-3 col-form-label">Trạng thái đơn hàng</label>
          <div class="col-sm-3">
            <select class="form-control" id="input-loai" name="ma_ttdh">
              <?php foreach ($dataloai as $value) : ?>
              <option value="<?= $value['id'] ?>" <?php if ($value['id'] == $result['id']) : ?>selected<?php endif; ?>>
                <?= $value['mota'] ?>
              </option>
              <?php endforeach; ?>
            </select>
          </div>


        </div>

        <div>
          <button class="btn btn-primary" id="submit-btn" name="submit">Cập nhật</button>
          <a href="index.php?page=donhang&act=list" class="btn btn-primary" name="danhsach">Danh sách đơn hàng</a>
        </div>
        <div class="error-msg" style="color: <?= $color ?>;"><?= $msg ?></div>
      </form>
    </div>
  </div>
</div>