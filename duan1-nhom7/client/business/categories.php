<?php
function loadall_danhmuc(){
    $sql = "SELECT * FROM categories";
    $listdanhmuc = executeQuery($sql, true);
    return $listdanhmuc;
}
