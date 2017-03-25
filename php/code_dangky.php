<?php

function timgiasu($ten, $sdt, $email, $mon, $yeucau, $diachi) {
    $qr = "INSERT INTO `hocvien`(`ID_HOCVIEN`, `ID_GS`, `TEN_HOCVIEN`, "
            . "`EMAIL__HOCVIEN`, `SDT_HOCVIEN`, `DIACHI_HOCVIEN`, `TG_DK_HV`, "
            . "`DAXEM_HOCVIEN`, `DK_TN`, `DK_MON`, `DK_LOP`,`YEUCAU`) VALUES "
            . "(NULL,NULL,'$ten','$email','$sdt','$diachi',now(),NULL,1,'$mon',0,'$yeucau')";
    mysql_query($qr);
   
    echo '<br/><h4 style="color: blue; text-align:center;">Đăng ký thành công</h4><br/>';
}

function dangkygiasu($giasu, $ten, $sdt, $email, $mon, $yeucau, $diachi) {
    $qr = "INSERT INTO `hocvien`(`ID_HOCVIEN`, `ID_GS`, `TEN_HOCVIEN`, "
            . "`EMAIL__HOCVIEN`, `SDT_HOCVIEN`, `DIACHI_HOCVIEN`, "
            . "`TG_DK_HV`, `DAXEM_HOCVIEN`, `DK_TN`, `DK_MON`, `DK_LOP`,`YEUCAU`) "
            . "VALUES (NULL,'$giasu','$ten','$email','$sdt','$diachi',now(),NULL,0,'$mon',0,'$yeucau')";
    mysql_query($qr);
    echo '<h4 style="color: blue; text-align:center;">Đăng ký gia sư này thành công</h4><br/>';
}

function dangkychieusinh($chieusinh, $ten, $sdt, $email, $yeucau, $diachi) {
    $qr = "SELECT * FROM chieusinh WHERE ID_CHIEUSINH = " . $chieusinh;
    //echo $qr;
    $query = mysql_query($qr);
    //$num =mysql_num_rows($query);

    $qr1 = "INSERT INTO `hocvien`(`ID_HOCVIEN`, `ID_GS`, `TEN_HOCVIEN`, `EMAIL__HOCVIEN`, `SDT_HOCVIEN`, `DIACHI_HOCVIEN`, `TG_DK_HV`, `DAXEM_HOCVIEN`, `DK_TN`, `DK_MON`, `DK_LOP`,`YEUCAU`) VALUES (NULL,NULL,'$ten','$email','$sdt','$diachi',now(),NULL,NULL,NULL,'1','$yeucau')";
    mysql_query($qr1);
    //echo $qr;
    $idhocvien = mysql_insert_id();
    //echo $idhocvien;
    $qr = "INSERT INTO `dangkychieusinh`(`ID_HOCVIEN`, `ID_CHIEUSINH`) VALUES ($idhocvien,$chieusinh)";
    mysql_query($qr);
    $row_chieusinh = mysql_fetch_array($query);
    echo '<h4 style="color: blue; text-align:center;">Đăng ký khóa chiêu sinh ' . $row_chieusinh["TEN_CHIEUSINH"] . ' thành công</h4><br/>';
}

//dang ky mo lop
function kttrung_yeycau($ten, $sdt, $mail,$monhoc) {
    $qr = "Select * from `hocvien` where `TEN_HOCVIEN`='$ten' AND `SDT_HOCVIEN`='$sdt' AND `EMAIL__HOCVIEN`='$mail' and `DK_MON`='$monhoc'";
    $result = mysql_query($qr);
    if (mysql_fetch_array($result) > 0) {
        return 1;
    } 
    else {
        return 0;
    }
}

function yeucaumolop($ten, $sdt, $email, $mon, $yeucau) {
    if(kttrung_yeycau($ten, $sdt, $email,$mon)==0){
    $qr = "INSERT INTO `hocvien`(`ID_HOCVIEN`, `ID_GS`, `TEN_HOCVIEN`, `EMAIL__HOCVIEN`, `SDT_HOCVIEN`,`TG_DK_HV`, `DAXEM_HOCVIEN`, `DK_TN`, `DK_MON`, `DK_LOP`,`YEUCAU`) VALUES (NULL,NULL,'$ten','$email','$sdt',now(),'0',NULL,'$mon','1','$yeucau')";
    mysql_query($qr);
    echo '<h4 style="color: blue; text-align:center;">Đăng ký gia sư này thành công</h4><br/>';
    }
    else {
        echo '<h4 style="color: red; text-align:center;">Bạn đã đăng ký rồi, trung tâm sẽ liên hệ với bạn sớm nhất</h4><br/>';        
    }
}

