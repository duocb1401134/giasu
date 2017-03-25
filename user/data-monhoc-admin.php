<?php 
require '../php/dbc.php';
$id = $_POST['id'];
$sql = "select * from monhoc where ID_LOP = '$id'";
$qr = mysql_query($sql);
$num = mysql_num_rows($qr);
if($num >0 ){
    while ($row = mysql_fetch_array($qr)){
       
        $res = "<option ";
        $res .="value='" . $row['ID_MONHOC'] . "'>";
        $res .=$row['TEN_MONHOC'];
        $res .='</option>';
        echo $res;
        
}
}
?>