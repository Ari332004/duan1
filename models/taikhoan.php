<?php
function tai_khoan_insert($mat_khau, $ho_ten, $email, $hinh, $vai_tro, $tel,$address){
  $sql = "INSERT INTO users(password, username, email, img, vai_tro, sdt,dia_tri) VALUES (?, ?, ?, ?, ?, ?,?)";
  pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $vai_tro==1, $tel,$address);
}

function tai_khoan_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $vai_tro, $tel,$address){
  $sql = "UPDATE users SET password=?,username=?,email=?,img=?,vai_tro=?,sdt=?,dia_tri=? WHERE id=?";
  pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $vai_tro==1, $tel, $address, $ma_kh);
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

function tai_khoan_select_all(){
  $sql = "SELECT * FROM users";
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
}
?>