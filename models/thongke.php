<?php
function thongke_sp($start_date = null, $end_date = null) {
  $sql = "SELECT DATE(ngay_dat_hang) AS ngay, SUM(tong) AS doanh_thu
  FROM donhang";

  if ($start_date && $end_date) {
      $sql .= " WHERE ngay_dat_hang BETWEEN '$start_date' AND '$end_date'";
  } elseif ($start_date) {
      $sql .= " WHERE ngay_dat_hang >= '$start_date'";
  } elseif ($end_date) {
      $sql .= " WHERE ngay_dat_hang <= '$end_date'";
  }

  $sql .= " GROUP BY DATE(ngay_dat_hang) order by ngay_dat_hang desc  limit 10";

  return pdo_query($sql);
}

  function thongke_spct()
{
    $sql = "SELECT c.ma_sp, p.ten_sp, m.ten_mau, SUM(c.so_luong) AS tong_so_luong, SUM(d.so_luong) AS so_luong_da_ban,
    CONCAT(ROUND((SUM(d.so_luong) / (SELECT SUM(d2.so_luong) FROM chitietdonhang d2)) * 100, 2), '%') AS ti_le_ban,
    SUM(d.so_luong * p.gia) AS tong_tien_ban
    FROM sanphamchitiet c
    JOIN sanpham p ON c.ma_sp = p.id
    JOIN mau m ON c.ma_mau = m.id
    JOIN chitietdonhang d ON c.id = d.ma_spct
    GROUP BY c.ma_sp, p.ten_sp, m.ten_mau
    ORDER BY so_luong_da_ban DESC";

  return pdo_query($sql);
}
function thongke_sp_theo_nam($year = null) {
  $sql = "SELECT MONTH(ngay_dat_hang) AS thang, SUM(tong) AS doanh_thu
  FROM donhang";
  
  if ($year) {
      $start_date = $year . '-01-01';
      $end_date = $year . '-12-31';
      $sql .= " WHERE ngay_dat_hang BETWEEN '$start_date' AND '$end_date'";
  }
  
  $sql .= " GROUP BY MONTH(ngay_dat_hang);";
  
  return pdo_query($sql);
}
function binh_luan_select_by_hang_hoa(){
$sql = "SELECT sanpham.ten_sp AS ten, COUNT(sanpham.id) AS soluong,
MAX(binhluan.ngay_bl) AS moi,
MIN(binhluan.ngay_bl) AS cu,
sanpham.id
FROM sanpham
JOIN binhluan ON sanpham.id = binhluan.ma_sp
GROUP BY sanpham.ten_sp;";
return pdo_query($sql);
}
function binh_luan_select_by_khach_hang($ma_sp){
$sql = "SELECT b.*, u.username FROM binhluan b JOIN users u ON u.id=b.ma_user WHERE b.ma_sp=?";
return pdo_query($sql, $ma_sp);
}
function rate_sanpham($id){
$sql = "SELECT r.id, r.mota AS rate_description, COUNT(b.id + 1) AS count FROM rate r LEFT JOIN binhluan b ON r.id =
b.rate AND b.ma_sp = ? GROUP BY r.mota
order by r.id asc";
return pdo_query($sql, $id);
}
?>