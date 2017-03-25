<?php

// Cập nhật thông tin
// Đổi mật khẩu
function doimatkhau($ID_GS, $matkhaumoi) {
    $select = "Select * from `giasu` where ID_GS=" . $ID_GS;
    $query = mysql_query($select);
    $ctgs = mysql_fetch_array($query);
    if (isset($_POST['submit'])) {
        if ($_POST['matkhaucu'] == $ctgs['MATKHAU_GS']) {
            if ($_POST['matkhaumoi'] == $_POST['nhaplaimatkhaumoi']) {
                $update = "UPDATE `giasu` SET `MATKHAU_GS`='$matkhaumoi' where ID_GS =" . $ID_GS;
                mysql_query($update);
                echo '<center>  <h4 style="color: blue;"> Cập nhật thành công </h4> </center>';
            } else {
                echo '<center>  <h4 style="color: red;"> Mật khẩu không khớp </h4> </center>';
            }
        } else {
            echo '<center>  <h4 style="color: red;"> Mật khẩu cũ không đúng </h4> </center>';
        }
    }
}

// Cập nhật hình ảnh
// Cập nhật chuyên ngành
function capnhatchuyennganh($khoinganh, $chuyennganh, $trinhdo, $ID_GS) {
    if (($khoinganh != NULL) && ($chuyennganh != NULL) && ($trinhdo != NULL)) {
        $qr = "UPDATE `giasu` SET `ID_TRINHDO`='" . $trinhdo . "',`ID_KHOINGANH`='" . $khoinganh . "',`CHUYENNGANH_GS`='" . $chuyennganh . "' WHERE ID_GS = " . $ID_GS;
        mysql_query($qr);
        echo "<p style='font-family:Cambridge ; color:blue;'>Cập nhật thành công</p>";
    } else {
        echo "<p style='font-family:Cambridge ; color:red; font-size:18px; text-align:center;'>Bạn chưa nhập đầy đủ thông tin</p>";
    }
}

// Đăng ký môn
function dangkyall($lop, $ID_GS) {
    $k = 0;
    $qr = "SELECT * FROM monhoc WHERE ID_LOP = '" . $lop . "'";
    $query = mysql_query($qr);
    $num_somon = mysql_num_rows($query);
    // Kiểm tra xem có môn nào đã đăng ký chưa
    while ($row_monhoc = mysql_fetch_array($query)) {
        $qr1 = "SELECT * FROM day WHERE ID_MONHOC = '" . $row_monhoc["ID_MONHOC"] . "'";
        $query1 = mysql_query($qr1);
        $num1 = mysql_num_rows($query1);
        if ($num1 > 0) {
            $k++;
        }
    }
    if ($k == $num_somon)
        echo "<p style='font-family:Cambridge ; color:red; font-size:18px; text-align:center;'>Lớp này đã đăng ký rồi</p>";
    else {
        $qr = "SELECT * FROM monhoc WHERE ID_LOP = '" . $lop . "'";
        $query = mysql_query($qr);
        while ($row_monhoc = mysql_fetch_array($query)) {
            $qr1 = "SELECT * FROM day WHERE ID_MONHOC = '" . $row_monhoc["ID_MONHOC"] . "'";
            $query1 = mysql_query($qr1);
            $num1 = mysql_num_rows($query1);
            if ($num1 == 0) {
                $qr = "INSERT INTO `day`(`ID_GS`, `ID_MONHOC`) VALUES (" . $ID_GS . " ,'" . $row_monhoc["ID_MONHOC"] . "')";
                mysql_query($qr);
            }
        }
    }
}

function dangkytungmon($lop, $ID_GS, $checki, $j) {
    if ($checki != NULL) {
        $qr = "SELECT * FROM day WHERE  ID_GS = " . $_SESSION["ID_GS"] . " AND ID_MONHOC = '" . $checki . "'";
        $query = mysql_query($qr);
        if ($query == NULL) {
            $num_day = 0;
        } else {
            $num_day = mysql_num_rows($query);
        }
        if ($num_day == 0) {
            $qr = "INSERT INTO `day`(`ID_GS`, `ID_MONHOC`) VALUES (" . $ID_GS . ",'" . $checki . "')";
            mysql_query($qr);
            $j++;
        } else {
            $qr = "SELECT * FROM monhoc WHERE ID_MONHOC = '" . $checki . "'";
            $query = mysql_query($qr);
            $row_dkmonhoc = mysql_fetch_array($query);
            $qr1 = "SELECT * FROM lop WHERE ID_LOP = '" . $lop . "'";
            $query1 = mysql_query($qr1);
            $row_dkmonhoc1 = mysql_fetch_array($query1);
            echo "<p style='font-family:Cambridge ; color:red; font-size:18px; text-align:center;'>Bạn đã đăng ký dạy môn " . $row_dkmonhoc["TEN_MONHOC"] . "- " . $row_dkmonhoc1["TEN_LOP"] . " rồi</p>";
            $j++;
        }
    }
    return $j;
}

function xoadangkymon($ID_GS, $delej) {
    if ($delej != NULL) {
        $qr = "DELETE FROM day WHERE ID_GS = '" . $ID_GS . "' AND ID_MONHOC = '" . $delej . "'";
        mysql_query($qr);
    }
}

// Đăng ký nơi dạy
function dangkytinh($tinh, $ID_GS) {
    $sql = "SELECT * FROM dangkynoiday WHERE ID_TINH = '" . $tinh . "' AND ID_GS = " . $ID_GS;
    $query = mysql_query($sql);
    $num = mysql_num_rows($query);
    $row_dknd = mysql_fetch_array($query);
    if ($num == 0) {
        $qr = "INSERT INTO dangkynoiday(`ID_TINH`, `ID_HUYEN`, `ID_GS`) VALUES ('" . $tinh . "',null," . $ID_GS . ")";
    }
    if ($num == 1) {
        if ($row_dknd["ID_HUYEN"] == null) {
            echo "<p style='font-family:Cambridge ; color:red;  font-size:18px; text-align:center;'>Tỉnh này đã được đăng ký rồi</p>";
        } else {
            $qr = "DELETE FROM dangkynoiday WHERE ID_HUYEN = " . $row_dknd["ID_HUYEN"];
            mysql_query($qr);
            $qr = "INSERT INTO dangkynoiday(ID_HUYEN,ID_TINH,ID_GS) VALUES (null," . $tinh . "," . $ID_GS . ")";
        }
    }
    if ($num > 1) {
        $qr = "DELETE FROM dangkynoiday WHERE ID_TINH = " . $row_dknd["ID_TINH"];
        mysql_query($qr);
        $qr = "INSERT INTO dangkynoiday(ID_HUYEN,ID_TINH,ID_GS) VALUES (null," . $tinh . "," . $ID_GS . ")";
    }
    if (isset($qr)) {
        mysql_query($qr);
    }
}

function dangkyhuyentinh($tinh, $ID_GS, $checki, $j) {
    $sql = "SELECT * FROM dangkynoiday WHERE ID_TINH = '" . $tinh . "' AND ID_GS = " . $ID_GS;
    $query = mysql_query($sql);
    $num = mysql_num_rows($query);
    $row_dknd = mysql_fetch_array($query);
    if ($checki != NULL) {
        $j++;
        /* $qr2 = "SELECT * FROM `dangkynoiday` WHERE ID_HUYEN =".$checki." AND ID_GS=".$ID_GS;
          $query2= mysql_query($qr2);
          if(($query2)==NULL)
          {
          $num_dknd = 0;
          }
          else
          {
          $num_dknd = mysql_num_rows($query2);
          }
          //echo $num_dknd;
          if($num_dknd == 1)
          {
          echo "<p style='font-family:Cambridge ; color:red; font-size:18px; text-align:center;'>Huyện của tỉnh này đã được đăng ký rồi</p>";
          }
          else */ {
            $qr = "INSERT INTO `dangkynoiday`(`ID_TINH`, `ID_HUYEN`, `ID_GS`) VALUES (" . $tinh . "," . $checki . "," . $ID_GS . ")";
            //echo $qr;
            mysql_query($qr);
        }
    }
    return $j;
}

function xoadangkynoiday($ID_GS, $delej) {
    if ($delej != NULL) {
        $qr = "DELETE FROM dangkynoiday WHERE ID_GS = " . $ID_GS . " AND " . $delej;
        mysql_query($qr);
    }
}

// Đăng ký buổi
?>