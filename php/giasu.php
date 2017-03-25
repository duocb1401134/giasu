<?php

// hien chi tiet gia su
function CT_GS($ID_GS) {
    $qr = "SELECT * FROM giasu WHERE ID_GS='$ID_GS'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
} 
// Hiện trình dộ theo gia sư
function Hientrinhdo_GS($ID_TRINHDO) {
    $qr = "SELECT * FROM trinhdo WHERE ID_TRINHDO='$ID_TRINHDO'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}

//Hiện môn và lớp dạy gia sư
//Hiện dạy theo gia sư
function Hienday_GS($ID_GS) {
    $qr = "SELECT * FROM day WHERE ID_GS='$ID_GS'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện môn dạy theo gia sư
function Hienmonday_GS($ID_MONHOC) {
    $qr = "SELECT * FROM monhoc WHERE ID_MONHOC='$ID_MONHOC'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện lớp dạy theo gia sư
function Hienlopday_GS($ID_LOP) {
    $qr = "SELECT * FROM lop WHERE ID_LOP='$ID_LOP'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện thời khóa biểu theo gia sư
// Hiện buổi theo gia sư
function Hienbuoi_GS($ID_GS) {
    $qr = "SELECT * FROM buoitrongngay WHERE ID_GS='$ID_GS'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện nơi đăng ký dạy theo gia sư
// Hiên đăng ký nơi dạy theo gia sư
function Hiendangkynoiday_GS($ID_GS) {
    $qr = "SELECT * FROM dangkynoiday WHERE ID_GS='$ID_GS'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện đăng ký huyện theo gia sư
function Hienhuyen_GS($ID_HUYEN) {
    $qr = "SELECT * FROM huyen WHERE ID_HUYEN='$ID_HUYEN'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện đăng ký tỉnh theo huyện
function Hientinh_GS($ID_TINH) {
    $qr = "SELECT * FROM tinh WHERE ID_TINH='$ID_TINH'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện 4 tin tức
function Top4_TT(){
    $qr ="SELECT * FROM tintuc WHERE DUYET_GS = 1 Order by ID_GS LIMIT 0,4";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}


