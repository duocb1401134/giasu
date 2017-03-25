<?php
// Hiện tên môn theo ID_MONHOC
function Hientenmonhoc($ID_MONHOC) {
    $qr = "SELECT * FROM monhoc WHERE ID_MONHOC='$ID_MONHOC'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện tất cả gia sư
 function Hien_allgiasu() {
    $qr = "SELECT * FROM giasu order by ID_GS DESC";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
} 
// Hiện gia sư theo trang
function Hiengiasu_phantrang($from,$sotin) {
    $qr = "SELECT * FROM giasu WHERE DUYET_GS = 1 order by ID_GS DESC LIMIT $from,$sotin";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện hình
function Hienhinh($ID_IMG) {
    $qr = "SELECT * FROM image WHERE ID_IMG='$ID_IMG'";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Hiện 5 tin nhỏ
function Hien5tinnho() {
    $qr = "SELECT * FROM tintuc LIMIT 0,5";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}
// Tìm kiếm gia sư
function Timkiem_GS($from,$sotin,$monhoc,$tinh) {
	if($monhoc==null){$qrmonhoc="";}
	else $qrmonhoc=" AND d.ID_MONHOC= '".$monhoc."'";
	if($tinh==null){$qrtinh="";}
	else $qrtinh=" AND dknd.ID_TINH='".$tinh."'";
    $qr = "SELECT gs.GIOITHIEU_GS, gs.ID_GS, gs.ID_IMG, gs.TEN_GS FROM giasu gs, day d, dangkynoiday dknd WHERE gs.ID_GS = d.ID_GS AND gs.ID_GS = dknd.ID_GS ".$qrtinh.$qrmonhoc." AND DUYET_GS = 1 LIMIT $from,$sotin";
   //echo $qr;
   return mysql_query($qr);
   mysql_set_charset($qr, 'UTF8');
}
?>