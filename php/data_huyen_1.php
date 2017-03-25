<?php
require 'dbc.php';
$key = $_POST['id'];
$sql = "select * from huyen where ID_TINH = '$key'";
$query = mysql_query($sql);
$num = mysql_num_rows($query);
if ($num > 0) {
    while ($row = mysql_fetch_array($query)) {
        $res = "<option ";
        $res .="value='" . $row['ID_HUYEN'] . "'>";
        $res .=$row['TEN_HUYEN'];
        $res .='</option>';
        echo $res;
    }
}
?>