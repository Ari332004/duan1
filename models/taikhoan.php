<?php
function tai_khoan_insert($mat_khau, $ho_ten, $email, $hinh, $vai_tro, $tel,$address){
  $sql = "INSERT INTO users(password, username, email, img, vai_tro, sdt,dia_tri) VALUES (?, ?, ?, ?, ?, ?,?)";
  pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $vai_tro==1, $tel,$address);
}

function tai_khoan_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $vai_tro, $tel,$address){
  $sql = "UPDATE users SET password=?,username=?,email=?,img=?,vai_tro=?,sdt=?,dia_tri=? WHERE id=?";
  pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $vai_tro==1, $tel, $address, $ma_kh);
}
function update_user($ma_kh, $ho_ten, $email, $hinh, $tel,$address){
  $sql = "UPDATE users SET username=?,email=?,img=?,sdt=?,dia_tri=? WHERE id=?";
  pdo_execute($sql, $ho_ten, $email, $hinh, $tel, $address, $ma_kh);
}

function tai_khoan_delete($ma_kh){
  $sql = "DELETE FROM users  WHERE id=?";
  if(is_array($ma_kh)){
      foreach ($ma_kh as $ma) {
          pdo_execute($sql, $ma);
      }
  }
  else{
      pdo_execute($sql, $ma_kh);
  }
}

function tai_khoan_select_all($username="",$id=0,$email="",$dia_tri="",$sdt="",$vai_tro=""){
  $sql = "SELECT * FROM users WHERE 1";
  if($id>0){
    $sql.=" and id ='".$id."'";
  }
  if($username!=""){
    $sql.=" and username like '%".$username."%'";
  }
  if($email!=""){
    $sql.=" and email like '%".$email."%'";
  }
  if($dia_tri!=""){
    $sql.=" and dia_tri like '%".$dia_tri."%'";
  }
  if($sdt!=""){
    $sql.=" and sdt like '%".$sdt."%'";
  }
  if($vai_tro!=""){
    $sql.=" and vai_tro like '%".$vai_tro."%'";
  }
  $sql.=" order by id desc";
  return pdo_query($sql);
}

function tai_khoan_select_by_id($ma_kh){
  $sql = "SELECT * FROM users WHERE id=?";
  return pdo_query_one($sql, $ma_kh);
}

function dangky($user,$pass){
  $sql="INSERT INTO users(username, password) VALUES (?, ?); ";
  pdo_execute($sql, $user,$pass);
}

function dangnhap($user,$pass) {
  $sql="SELECT * FROM users WHERE username=? and password=?";
  return pdo_query_one($sql, $user, $pass);
}

function dangxuat() {
  if (isset($_SESSION['user'])) {
      unset($_SESSION['user']);
  }
  header('Location: index.php');
}
?>