<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form method="post">
        <legend class="text-center mb-4">Quản lý danh mục</legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã danh mục</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" name="id" value="auto number" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Tên danh mục</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Tên danh mục" name="tensp" />
          </div>
        </div>
        <button type="button" class="btn btn-primary" id="find-btn" name="find">Tìm kiếm</button>
      </form>
    </div>
  </div>
</div>
<div class="container" style="max-width: 90%">
  <form action="" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Mã</th>
          <th scope="col">Tên</th>
          <th scope="col">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <tr>
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
</div>