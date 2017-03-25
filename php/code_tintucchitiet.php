<?php
// Hiện tin tức chi tiết
function tintucchitiet($ID_TT) {
    $qr = "SELECT * FROM tintuc WHERE ID_TT='$ID_TT' Order by ID_TT";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
} 
// Hiện tin tức
function tintuc($ID_TT) {
    $qr = "SELECT * FROM tintuc WHERE ID_TT='$ID_TT'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện 5 tin nhỏ không trùng với tin đang xem
function Hien5tinnhoNOTLIKE($ID_TT) {
    $qr = "SELECT * FROM tintuc WHERE ID_TT NOT LIKE $ID_TT LIMIT 0,5";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
} 
?>

