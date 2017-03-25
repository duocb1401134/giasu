<?php
// Hiện tất cả tin tức
 function Hien_alltintuc() {
    $qr = "SELECT * FROM tintuc";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
} 
// Hiện tin tức theo trang
function Hientintuc_phantrang($from,$sotin) {
    $qr = "SELECT * FROM tintuc order by ID_TT DESC LIMIT $from,$sotin";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
?>
