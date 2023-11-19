<div class="container" id="main">
  <div class="row justify-content-center align-items-center mt-4">
    <div class="col-lg-6 col-lg-offset-4">
      <form>
        <legend class="text-center">Quản lý sản phẩm</legend>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Tên sản phẩm</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="input-name" placeholder="Input Name" />
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-loai" class="col-sm-3 col-form-label">Loại</label>
          <div class="col-sm-3">
            <select class="form-control" id="input-loai">
              <option value="">Loại hàng</option>
              <option value="Dog">Dog</option>
              <option value="Cat">Cat</option>
            </select>
          </div>

          <label for="input-brand" class="col-sm-3 col-form-label" style="text-align: right">Thương hiệu</label>
          <div class="col-sm-3">
            <select class="form-control" id="input-loai">
              <option value="">Thương hiệu</option>
              <option value="Dog">Dog</option>
              <option value="Cat">Cat</option>
            </select>
          </div>
        </div>
        <div class="form-group row mb-3">
          <label for="input-name" class="col-sm-3 col-form-label">Mô tả</label>
          <div class="col-sm-9">
            <textarea name="" class="form-control" id="input-name" cols="30" rows="5" placeholder="Mô tả"></textarea>
          </div>
        </div>
        <button type="button" class="btn btn-primary" id="submit-btn">
          Submit
        </button>
        <!-- <button type="button" class="btn btn-warning" id="healthy-btn">
                  Show Healthy Pet
                </button> -->
      </form>
    </div>
  </div>
</div>
<div class="container" style="max-width: 90%">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">Loại</th>
        <th scope="col">Thương hiệu</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Ngày thêm</th>
        <th scope="col">Hành động</th>
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
        <td>
          <button class="btn btn-danger" onclick="deletePet('${index}')">
            Delete
          </button>
        </td>
      </tr>
      <tr>
        <th scope="row">${pet.id}</th>
        <td>${pet.weight}</td>
        <td>${pet.length}</td>
        <td>${pet.date}</td>
        <td>${pet.date}</td>
        <td>${pet.date}</td>
        <td>
          <button class="btn btn-danger" onclick="deletePet('${index}')">
            Delete
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>