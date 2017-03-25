<?php
// Hiện chiêu sinh
function Hien6chieusinh() {
    $qr = "SELECT * FROM chieusinh LIMIT 0,6";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện tên gia sư
function Hientengiasu($ID_GS) {
    $qr = "SELECT * FROM giasu WHERE ID_GS =".$ID_GS;
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện tất cả chiêu sinh
 function Hien_allchieusinh() {
    $qr = "SELECT * FROM chieusinh";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
} 
// Hiện chiêu sinh theo trang
function Hienchieusinh_phantrang($from,$sotin) {
    $qr = "SELECT * FROM chieusinh LIMIT $from,$sotin";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
?>

