<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form method="post" action="">
        <legend class="text-center mb-4"><?= $h2 ?></legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã danh mục</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" name="id" value="<?= $result['id'] ?? "AUTO NUMBER" ?>"
              readonly />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Tên danh mục</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Tên danh mục" name="name"
              value="<?= $result['ten_dm'] ?? "" ?>" />
          </div>
        </div>
        <button class="btn btn-primary" id="submit-btn" name="submit">Thêm mới</button>
        <input type="reset" class="btn btn-primary" name="nhaplai"></input>
        <a href="index.php?act=list&page=loai" class="btn btn-primary" name="danhsach">Danh sach</a>
        <div class="error-msg" style="color: <?= $color ?>;"><?= $msg ?></div>
      </form>
    </div>
  </div>
</div>
</div>
</div>