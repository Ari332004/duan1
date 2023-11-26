<?php
function select_all_spct($idspct = 0, $ten_mau = "", $ten_cl = "", $so_luong = 0, $luot_xem = 0)
{
    $sql = "SELECT sanphamchitiet.id, mau.ten_mau, chatlieu.ten_cl,so_luong,luot_xem
FROM sanphamchitiet
INNER JOIN chatlieu ON sanphamchitiet.ma_cl = chatlieu.id
INNER JOIN mau ON sanphamchitiet.ma_mau = mau.id;";
    if ($idspct > 0) {
        $sql .= " and id ='" . $idspct . "'";
    }
    if ($ten_mau != "") {
        $sql .= " and ten_mau like '%" . $ten_mau . "%'";
    }
    if ($ten_cl != "") {
        $sql .= " and ten_cl like '%" . $ten_cl . "%'";
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
function spct_update($ma_sp, $ten_mau, $ten_cl, $so_luong, $luot_xem)
{
    $sql = "UPDATE sanphamchitiet SET id=?,ma_sp=?,ten_mau=?,ten_cl=?,so_luong=? WHERE id=?";
    pdo_execute($sql, $ma_sp, $ten_mau, $ten_cl, $so_luong, $luot_xem);
}
function spct_insert($idspct, $ma_sp, $ten_mau, $ten_cl, $so_luong, $luot_xem)
{

    $sql = "INSERT INTO sanphamchitiet(id, ten_mau, ten_cl, so_luong,luot_xem) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $idspct, $ma_sp, $ten_mau, $ten_cl, $so_luong, $luot_xem);
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