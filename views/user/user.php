<style>
.category .category-block .item {
  display: flex;
  flex-direction: row;
  gap: 10px;
  font-size: 14px;
  font-weight: 500;
  margin-bottom: 1rem;
  padding: 0.8rem;
}

.category {
  padding: 1.6rem;
}

.category .category-block {
  cursor: pointer;
}

.category .category-block:hover {
  background-color: rgb(36, 36, 36);
  color: rgb(255, 255, 255);
  border-radius: 5px;
}

.category .category-block:hover a:hover {
  color: rgb(255, 255, 255);
}

.active-category {
  background-color: rgb(36, 36, 36);
  color: rgb(255, 255, 255);
  border-radius: 5px;
}

.btn-luu {
  background-color: rgb(36, 36, 36);
  color: rgb(255, 255, 255);
  font-size: 16px;
  border-radius: 5px;
  padding: 8px 12px;
  font-weight: 600;
  margin-top: 10px;
}

.title {
  font-weight: 600;
  padding-bottom: 2rem;
  margin-bottom: 2rem;
}

.btn-image {
  border: 1px solid rgb(238, 238, 238);
  border-radius: 4px;
  padding: 3px 12px;
  font-size: 14px;
  line-height: 18px;
  color: rgb(51, 51, 51);
  margin-bottom: 1rem;
  margin-top: 2rem;
  cursor: pointer;
}

.avatar {
  border-right: 1px solid rgb(238, 238, 238);
  padding-right: 30px;
  margin-right: 30px;
}
</style>
<?php
$msg='';
$color = 'green';
  if(isset($_POST['luuTD'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tel = $_POST['sdt'];
    $address = $_POST['dia_tri'];
    $anh = $datauser['img'];
    if($_FILES['anh']['name'] != ""){
      unlink("uploads/user/".$datauser['img']);
      $anh = "user".$datauser['id']."_" . $_FILES['anh']['name'];
      move_uploaded_file($_FILES['anh']['tmp_name'], "uploads/user/$anh");
    }

    if($username != '' && $email != '' && $tel != '' && $address != ''){
      $username = test_input($username);
      $email = test_input($email);
      $tel = test_input($tel);
      $address = test_input($address);
      $ktra = true;
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Vui lòng nhập đúng dữ liệu";
        $color = 'red';
        $ktra = false;
      } else {
        $ktra = true;
      }
      $pattern = '/^0|\+84[ \.]?([3-9]\d{2})[ \.]?\d{3}[ \.]?\d{3}$/';

      if (!preg_match($pattern, $tel)) {
        $msg = "Vui lòng nhập đúng dữ liệu";
        $color = 'red';
        $ktra = false;
      } else {
        $ktra = true;
      }
      if($ktra){
        update_user($_SESSION['user']['id'],$username, $email, $anh, $tel,$address);
        header('location: index.php?act=user');
      }
    } else{
      $msg = 'Vui lòng nhập đầy đủ thông tin';
      $color = 'red';
    }
  }
?>
<div class="container mt-5" style="width: 85%">
  <div class="d-flex flex-row gap-3">
    <div class="col-lg-1" style="width: 52px; height: 52px;">

      <?php 
      $img =  $datauser!=''?$datauser['img']: 'userDefault.png';?>
      <img src="./uploads/user/<?= $img?>" style="height: 52px;" alt="" width="52px" height="52px"
        class="rounded-circle" />
    </div>
    <div class="row">
      <div>Xin chào,</div>
      <div style="font-weight: 600"><?= $datauser['username']?></div>
    </div>
  </div>
  <div class="d-flex flex-row gap-3 mt-4">
    <div class="col-lg-2 col-md-2">
      <div class="category">
        <div class="category-block active-category">
          <a class="item" href="index.php?act=user">
            <div><i class="bi bi-box-seam"></i>
            </div>
            <div>Hồ sơ</div>
          </a>
        </div>
        <div class="category-block">
          <a class="item" href="index.php?act=myorder">
            <div><i class=" bi bi-person-fill"></i>
            </div>
            <div>Đơn hàng</div>
          </a>
        </div>
        <div class="category-block">
          <a class="item" href="index.php?act=dangxuat">
            <div><i class="bi bi-box-arrow-left"></i></div>
            <div>Đăng xuất</div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-10 col-md-10" style="border-left: 1px solid rgb(218, 218, 218);padding: 2.4rem">

      <form method="post" enctype="multipart/form-data">
        <legend class="title" style="
              border-bottom: 1px solid rgb(238, 238, 238);">Hồ sơ của tôi</legend>
        <div class="d-flex flex-row">
          <div class="avatar col-lg-5 col-md-5">
            <div class="d-flex flex-column" style="align-items: center;">
              <img src="./uploads/user/<?= $img?>" alt="" width="100px" height="100px" class="rounded-circle"
                id="selectedImage" style="object-fit: cover; width: 100px; height: 100px;" />
              <label for="anh" class="btn-image">Chọn ảnh</label>
              <input type="file" id="anh" name="anh" style="display: none" onchange="changeImage()" />
              <p style="text-align: center">
                Dung lượng tối đa 1MB. Định dạng .JPEG, .PNG
              </p>
            </div>
          </div>
          <div class="thongtin col-lg-7 col-md-7" style="box-sizing: border-box;">
            <div class="d-flex flex-column">
              <div class="form-group row mb-3">
                <label for="input-name" class="col-sm-4 col-form-label">Tên đăng nhập</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="input-name" value="<?= $datauser['username']?>"
                    name="username" />
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="input-email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="input-email" value="<?= $datauser['email']?>"
                    name="email" />
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="input-sdt" class="col-sm-4 col-form-label">Số điện thoại</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="input-sdt" value="<?= $datauser['sdt']?>" name="sdt" />
                </div>
              </div>
              <div class="form-group row mb-3">
                <label for="input-dia_tri" class="col-sm-4 col-form-label">Địa chỉ</label>
                <div class="col-sm-7">
                  <textarea name="dia_tri" class="form-control" id="input-dia_tri" cols="30"
                    rows="5"><?= $datauser['dia_tri']?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="text-align: right;">
          <button name="luuTD" class="btn-luu">Lưu thay đổi</button>
          <div class="error-msg" style="color: <?= $color ?>;"><?= $msg ?></div>
        </div>
      </form>

    </div>
  </div>
</div>
<script>
function changeImage() {
  var input = document.getElementById('anh');
  var img = document.getElementById('selectedImage');

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      img.src = e.target.result;
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>