<?php
//code hiện tỉnh
function Hientinh(){
    $qr ="SELECT * FROM tinh";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// code hiện lớp
function Hienlop(){
    $qr ="SELECT * FROM lop";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
//code hiện môn học
function Hienmonhoc($caplop){
    $qr ="SELECT * FROM thuoc WHERE ID_LOP='$caplop'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// code hiện chiêu sinh top 3
function Chieusinh_top3(){
    $qr ="SELECT * FROM chieusinh ORDER BY ID_CHIEUSINH DESC LIMIT 0,3";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
function Tenlop($ID_LOP){
    $qr ="SELECT TEN_LOP FROM lop WHERE ID_LOP='$ID_LOP'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
?>


