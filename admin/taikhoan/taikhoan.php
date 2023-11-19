<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form action="" method="post" enctype="multipart/form-data">
        <legend class="text-center">Quản lý tài khoản</legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã tài khoản</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" name="id" value="auto number" readonly />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="username" class="col-sm-3 col-form-label">Tên đăng nhập</label>
          <div class="col-sm-9"><input type="text" class="form-control" id="username" name="username"
              placeholder="Tên đăng nhập"></div>
        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label" for="password">Mật khẩu</label>
          <div class="col-sm-9"><input type="password" class="form-control" id="password" name="password"
              placeholder="Mật khẩu"></div>

        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label" for="email">Email</label>
          <div class="col-sm-9"><input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>

        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label" for="phone">Số điện thoại</label>
          <div class="col-sm-9"><input type="text" class="form-control" id="phone" name="phone"
              placeholder="Số điện thoại"></div>

        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label">Vai trò</label>
          <div class="col-sm-9">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
              <label for="inlineRadio1">Nhân viên</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
              <label for="inlineRadio2">Khách hàng</label>
            </div>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label" for="image">Ảnh</label>
          <div class="col-sm-9"><input type="file" class="form-control-file" id="image" name="image"></div>

        </div>
        <div class="form-group row mb-3">
          <label class="col-sm-3 col-form-label" for="address">Địa chỉ</label>
          <div class="col-sm-9">
            <textarea name="address" class="form-control" id="address" cols="30" rows="5"
              placeholder="Mô tả"></textarea>
          </div>

        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>
      </form>
    </div>
  </div>
</div>
<div class="container" style="max-width: 90%">
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
      <tr>
        <th scope="row">1</th>
        <td>ab</td>
        <td>1</td>
        <td>45535</td>
        <td>$435</td>
        <td>gdgffb</td>
        <td>gdgffb</td>
        <td>
          <a class="btn btn-danger">
            Xóa
          </a>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>ab</td>
        <td>1</td>
        <td>45535</td>
        <td>$435</td>
        <td>$435</td>
        <td>gdgffb</td>
        <td>
          <a class="btn btn-danger">
            Xóa
          </a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>