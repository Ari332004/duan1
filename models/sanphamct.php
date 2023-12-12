<?php
function select_all_spct($idspct = 0, $ma_mau = 0, $mau_cl = 0, $so_luong = 0, $luot_xem = 0)
{
    $sql = "SELECT sanphamchitiet.*, mau.ten_mau, chatlieu.ten_cl
            FROM sanphamchitiet
            JOIN chatlieu ON sanphamchitiet.ma_cl = chatlieu.id
            JOIN mau ON sanphamchitiet.ma_mau = mau.id
            where 1";
    if ($idspct > 0) {
        $sql .= " and ma_sp ='" . $idspct . "'";
    }
    if ($ma_mau > 0) {
        $sql .= " and ma_mau ='" . $ma_mau . "'";
    }
    if ($mau_cl > 0) {
        $sql .= " and ma_cl ='" . $mau_cl . "'";
    }
    if ($so_luong > 0) {
        $sql .= " and so_luong ='" . $so_luong . "'";
    }
    if ($luot_xem > 0) {
        $sql .= " and luot_xem ='" . $luot_xem . "'";
    }
    $sql .= " order by id desc";
    return pdo_query($sql);
}
function spct_delete($id)
{
    $sql = "DELETE FROM sanphamchitiet WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
}
function spct_select_by_id($idspct)
{
    $sql = "SELECT * FROM sanphamchitiet WHERE id=?";
    return pdo_query_one($sql, $idspct);
}
function spct_update($idspct, $ma_sp, $ten_mau, $ten_cl, $so_luong)
{
    $sql = "UPDATE sanphamchitiet SET ma_sp=?,ten_mau=?,ten_cl=?,so_luong=? WHERE id=?";
    pdo_execute($sql, $ma_sp, $ten_mau, $ten_cl, $so_luong, $idspct);
}
function spct_insert($ma_sp, $ten_mau, $ten_cl, $so_luong)
{

    $sql = "INSERT INTO sanphamchitiet(ma_sp, ma_mau, ma_cl, so_luong) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_sp, $ten_mau, $ten_cl, $so_luong);
}
function select_mau(){
    $sql= "SELECT * FROM `mau` WHERE 1";
    return pdo_query($sql);

}
function select_cl()
{
    $sql = "SELECT * FROM `chatlieu` WHERE 1";
    return pdo_query($sql);
}
function sp_detail($id){
  $sql = "SELECT *,sanphamchitiet.id as maspct FROM sanphamchitiet 
          JOIN sanpham ON sanphamchitiet.ma_sp = sanpham.id
          WHERE sanphamchitiet.id=? LIMIT 1";
  return pdo_query_one($sql, $id);
}
function sp_detail_mau_cl($id,$ma_mau,$mau_cl){
  $sql = "SELECT *,sanphamchitiet.id as maspct FROM sanphamchitiet 
          JOIN sanpham ON sanphamchitiet.ma_sp = sanpham.id
          WHERE sanphamchitiet.ma_sp=? and ma_mau = ? and ma_cl = ? LIMIT 1";
  return pdo_query_one($sql, $id,$ma_mau,$mau_cl);
}
function detail_cl($ma_sp){
    $sql= "SELECT DISTINCT  chatlieu.id, chatlieu.ten_cl FROM sanphamchitiet 
    JOIN chatlieu ON sanphamchitiet.ma_cl = chatlieu.id
    WHERE ma_sp=?";
    return pdo_query($sql,$ma_sp);
}
function detail_mau($ma_sp){
    $sql= "SELECT DISTINCT  mau.id, mau.ten_mau, mau.code FROM sanphamchitiet 
    JOIN mau ON sanphamchitiet.ma_mau = mau.id
    WHERE ma_sp=?";
    return pdo_query($sql,$ma_sp);
}
function detail_anh($ma_sp){
    $sql= "SELECT * FROM anh WHERE anh.ma_sp=?";
    return pdo_query($sql,$ma_sp);
}