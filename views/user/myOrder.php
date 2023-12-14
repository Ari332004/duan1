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

.title {
  font-weight: 600;
  padding-bottom: 2rem;
  margin-bottom: 2rem;
}

.my_order .menu {
  border-bottom: 3px solid gray;
}



.my_order .menu a {
  font-weight: 500;
  flex-shrink: 1;
  flex-grow: 1;
}

.my_order .menu a:hover {
  color: rgb(255, 255, 255);
  background-color: rgb(36, 36, 36);
  border-radius: 5px;
}

.my_order .menu a:hover .btn {

  color: rgb(255, 255, 255);
}



.btn {
  font-weight: 500;
}

form {
  font-size: 14px;
}
</style>
<?php 
  $dataAll = selectall_donhang($datauser['id'],1); 
  $dataTT = selectall_trangthaidh(); 
  if(isset($_GET['tt'])){
    $dataAll = selectall_donhang($datauser['id'],$_GET['tt']);
  }
  if(isset($_GET['dh']) && isset($_GET['ttdh'])){
    ctdh_update($_GET['dh'],$_GET['ttdh']);
    $tt = $_GET['tt'] ?? '1';
    header('location: index.php?act=myorder&tt='.$tt);
  }
?>
<div class="container mt-5" style="width: 85%">
  <div class="d-flex flex-row gap-3">
    <div class="col-lg-1" style="width: 52px; height: 52px;">
      <?php 
      $img =  $datauser['img']!=''?$datauser['img']: 'userDefault.png';?>
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
        <div class="category-block">
          <a class="item" href="index.php?act=user">
            <div><i class="bi bi-box-seam"></i>
            </div>
            <div>Hồ sơ</div>
          </a>
        </div>
        <div class="category-block  active-category">
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

      <form id="order">

        <legend class="title">Đơn hàng của tôi</legend>
        <div class="d-flex flex-column my_order">
          <div class="menu">
            <div class="d-flex flex-row" style="align-items: center">
              <?php foreach ($dataTT as $key => $value) : ?>
              <a href="index.php?tt=<?= $value['id']; ?>&act=myorder" style="text-align: center;"><button type="button"
                  class="btn"><?= $value['mota']; ?></button></a>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="thongtin col-lg-7 col-md-7" style="box-sizing: border-box;width: 100%;">
            <div class="d-flex flex-column">
              <?php if(empty($dataAll)){?>
              <div class="mt-5 d-flex flex-column" style="justify-content: center; align-items: center;"><img
                  src="assets/img/about/EmptyOrder.a0f66ce0.svg" alt="" style="width: 100px; height: 100px;">
                <p>Đơn hàng trống</p>
              </div>
              <?php }else{?>
              <table class="table mt-4">
                <tbody>
                  <?php foreach ($dataAll as $key => $value) : ?>
                  <tr>
                    <td><?= $key+1; ?></td>
                    <td>DH<?= $value['id']; ?></td>
                    <td><?= $value['username']; ?></td>
                    <td><?= $value['phone']; ?></td>
                    <td><?= $value['dia_tri']; ?> </td>
                    <td style="text-align: center;">
                      <?php if($value['ma_ttdh'] == 1){
                        echo '<a href="index.php?dh='.$value['id'].'&ttdh=4&act=myorder" class="btn btn-danger">
                        Hủy đơn hàng
                      </a>';
                      } ?>
                      <?php if($value['ma_ttdh'] == 3){
                        echo '<a href="index.php?dh='.$value['id'].'&ttdh=5&act=myorder" class="btn btn-danger">
                        Đã nhận
                      </a>';
                      } ?>
                      <a href="index.php?dh=<?= $value['id']; ?>&act=myorderdetail" class="btn btn-danger">
                        Chi tiết đơn hàng
                      </a>

                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php }?>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
// const menu = document.querySelector(".menu");
// Duyệt qua tất cả các button khác trong menu
const buttons = document.querySelectorAll(".menu a");
buttons.forEach(function(btn) {
  btn.addEventListener("click", (event) => {
    // Lấy button được click
    const button = event.target;
    for (const b of buttons) {
      // Xóa class active-category khỏi các button khác
      if (b !== button) {
        b.classList.remove("active-category");
      }
    }

    // Thêm class active-category vào button được click
    button.classList.add("active-category");
  });
})
</script>