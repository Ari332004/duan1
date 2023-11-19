<?php
  function san_pham_insert($tensp, $loai, $gia, $mota)
  {
    $ngay_them = date('Y-m-d');
    $sql = "INSERT INTO sanpham(ten_sp, ma_dm, gia, ngay_nhap, mota) VALUES (?,?,?,?,?,?)";
    pdo_execute($sql, $tensp, $loai, $gia, $ngay_them, $mota);
  }
  
  function san_pham_update($idsp, $tensp, $loai, $gia, $mota)
  {
    $ngay_them = date('Y-m-d');
      $sql = "UPDATE sanpham SET ten_sp=?,ma_dm=?,gia=?,ngay_nhap=?,mota=? WHERE id=?";
      pdo_execute($sql, $tensp, $loai, $gia, $ngay_them, $mota, $idsp);
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
?>