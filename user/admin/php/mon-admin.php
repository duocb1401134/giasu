<?php
require '../dbc.php';
$ID_LOP = $_POST['id2'];
$sql1 = "select * from monhoc where ID_LOP = '$ID_LOP '";
$query1 = mysql_query($sql1);
$num1 = mysql_num_rows($query1);
if ($ID_LOP != "LV") {
    if ($num1 > 0) {
        while ($row1 = mysql_fetch_array($query1)) {
            $ID_MONHOC = $row1['ID_MONHOC'];
            $sql2 = "select * from monhoc where ID_MONHOC = '$ID_MONHOC '";
            $query2 = mysql_query($sql2);
            //$num2 = mysql_num_rows($query2);
            $row2 = mysql_fetch_array($query2);
            $res = "<option ";
            $res .="value='" . $row2['ID_MONHOC'] . "'>";
            $res .=$row2['TEN_MONHOC'];
            $res .='</option>';
            echo $res;
        }
    } else {
        echo '<option>--Không có lớp--</option>';
         
    }
}