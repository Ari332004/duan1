<?php
  function select_all_tt(){
    $sql = "SELECT * FROM thanhtoan WHERE 1";
    return pdo_query($sql);
  }
?>