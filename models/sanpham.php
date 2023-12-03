<?php
  function san_pham_insert($tensp, $loai, $gia, $mota)
  {
    $ngay_them = date('Y-m-d');
    $sql = "INSERT INTO sanpham(ten_sp, ma_dm, gia, ngay_nhap, mota) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $tensp, $loai, $gia, $ngay_them, $mota);
  }
  
  function san_pham_update($idsp, $tensp, $loai, $gia, $mota)
  {
      $sql = "UPDATE sanpham SET ten_sp=?,ma_dm=?,gia=?,mota=? WHERE id=?";
      pdo_execute($sql, $tensp, $loai, $gia, $mota, $idsp);
  }
  
  function san_pham_delete($idsp)
  {
    $sql = "DELETE FROM sanpham WHERE  id=?";
    if (is_array($idsp)) {
      foreach ($idsp as $ma) {
        pdo_execute($sql, $ma);
      }
    } else {
      pdo_execute($sql, $idsp);
    }
  }
  function san_pham_select_all($keyten="",$iddm=0,$idsp=0,$keymota=''){
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($idsp>0){
      $sql.=" and id ='".$idsp."'";
    }
    if($keyten!=""){
        $sql.=" and ten_sp like '%".$keyten."%'";
    }
    if($iddm>0){
        $sql.=" and ma_dm ='".$iddm."'";
    }
    if($keymota!=""){
      $sql.=" and mota like '%".$keymota."%'";
  }
    $sql.=" order by id desc";
    return pdo_query($sql);
}

function san_pham_select_by_id($idsp){
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql, $idsp);
}
function loai_select_all_sp(){
  $sql = "SELECT * FROM danhmuc";
  return pdo_query($sql);
}

function getImg($id){
  $sql = "SELECT * FROM anh WHERE ma_sp=? LIMIT 1";
  return pdo_query_one($sql,$id);
}
function getAllImg($id){
  $sql = "SELECT * FROM anh WHERE ma_sp=?";
  return pdo_query_one($sql,$id);
}
function sp_home($iddm=0){
  $sql = "SELECT sanpham.*, sanphamct.* FROM sanpham 
  JOIN ( SELECT ma_sp, MIN(id) as maspct
          FROM sanphamchitiet GROUP BY ma_sp ) as sanphamct ON sanpham.id = sanphamct.ma_sp
          where 1"; 
    if($iddm>0){
      $sql.=" and ma_dm ='".$iddm."'";
  }
    $sql.=" ORDER BY id DESC 
              LIMIT 0, 10";
  return pdo_query($sql);
}
function sp_shop($iddm=0,$keyten=""){
  $sql = "SELECT sanpham.*, sanphamct.* FROM sanpham 
          JOIN ( SELECT ma_sp, MIN(id) as maspct
                  FROM sanphamchitiet GROUP BY ma_sp ) as sanphamct ON sanpham.id = sanphamct.ma_sp
          where 1"; 
    if($iddm>0){
      $sql.=" and ma_dm ='".$iddm."'";
    }
    if($keyten!=""){
      $sql.=" and ten_sp like '%".$keyten."%'";
    }
    $sql.=" ORDER BY id DESC";
  return pdo_query($sql);
}
function filterPrice($max, $min){
  $sql = "SELECT sanpham.*, sanphamct.* FROM sanpham 
          JOIN ( SELECT ma_sp, MIN(id) as maspct
                  FROM sanphamchitiet GROUP BY ma_sp ) as sanphamct ON sanpham.id = sanphamct.ma_sp
          where gia > ? and gia < ?"; 
  
  return pdo_query($sql,$min, $max);
}
function filterMauCl($mau=0, $cl=0){
  $sql = "SELECT sanpham.*, sanphamct.* FROM sanpham 
          JOIN ( SELECT ma_sp, ma_mau, ma_cl, MIN(id) as maspct
                  FROM sanphamchitiet GROUP BY ma_sp ) as sanphamct ON sanpham.id = sanphamct.ma_sp
          where 1"; 
  if($mau>0){
    $sql.=" and sanphamct.ma_mau ='".$mau."'";
  }
  if($cl>0){
    $sql.=" and sanphamct.ma_cl ='".$cl."'";
  }
  $sql.=" ORDER BY sanpham.id DESC";
  return pdo_query($sql);
}
?>