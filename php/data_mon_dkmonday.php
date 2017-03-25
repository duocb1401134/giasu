<?php
require '../php/dbc.php';
$ID_LOP = $_POST['id2'];
$sql1 = "select * from monhoc where ID_LOP = '$ID_LOP'";
$query1 = mysql_query($sql1);
$num1 = mysql_num_rows($query1);
if ($num1 > 0) {
    $i=1;
    while ($row = mysql_fetch_array($query1)) {
		if($i%5==1)
			echo "<tr>";			
        $res = "<th><input name='check";
		$res .= $i."' type='checkbox' ";
        $res .= "value='" . $row['ID_MONHOC'] . "'> ";
        $res .= $row['TEN_MONHOC'];
        $res .= "</th>";
        echo $res;
		$i++;
		if($i/5==0)
			echo "</tr>";
    }
}
else {
    echo '<tr><th>--Không có lớp--</th> </tr>';
}
?>

