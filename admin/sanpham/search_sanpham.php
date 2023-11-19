<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4" id="container-form">
    <div class="col-lg-6 col-lg-offset-4">
      <form>
        <legend class="text-center">Tìm kiếm sản phẩm</legend>
        <div class="form-group row mb-3">
          <label for="id" class="col-sm-3 col-form-label">Mã sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="id" placeholder="Mã sản phẩm" name="idsp" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Tên sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Tên sản phẩm" name="tensp" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-loai" class="col-sm-3 col-form-label">Loại</label>
          <div class="col-sm-9">
            <select class="form-control" id="input-loai" name="loai">
              <option value="">Loại hàng</option>
              <option value="Dog">Dog</option>
              <option value="Cat">Cat</option>
            </select>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-mota" class="col-sm-3 col-form-label">Mô tả</label>
          <div class="col-sm-9">
            <textarea name="mota" class="form-control" id="input-mota" cols="30" rows="5"
              placeholder="Mô tả"></textarea>
          </div>
        </div>
        <button type="button" class="btn btn-primary" id="find-btn" name="findBtn">
          Find
        </button>
      </form>
    </div>
  </div>
</div>
<div class="container" style="max-width: 90%">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Mã</th>
        <th scope="col">Tên</th>
        <th scope="col">Loại</th>
        <th scope="col">Giá</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Ngày thêm</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">${pet.id}</th>
        <td>${pet.weight}</td>
        <td>${pet.length}</td>
        <td>${pet.date}</td>
        <td>${pet.date}</td>
        <td>${pet.date}</td>
      </tr>
      <tr>
        <th scope="row">${pet.id}</th>
        <td>${pet.weight}</td>
        <td>${pet.length}</td>
        <td>${pet.date}</td>
        <td>${pet.date}</td>
        <td>${pet.date}</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>