<?php
require '../php/dbc.php';
$key = $_POST['id'];
$sql = "select * from monhoc where ID_LOP = '$key'";
$query = mysql_query($sql);
$num = mysql_num_rows($query);
if ($num > 0) {
    while ($row = mysql_fetch_array($query)) {
        $res = "<option ";
        $res .="value='" . $row['ID_MONHOC'] . "'>";
        $res .=$row['TEN_MONHOC'];
        $res .='</option>';
        echo $res;
    }
}
?>