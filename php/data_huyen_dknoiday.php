<?php
require '../php/dbc.php';
$key = $_POST['id'];
$sql = "select * from huyen where ID_TINH = '$key'";
$query = mysql_query($sql);
$num = mysql_num_rows($query);
if ($num > 0) {
	$i=1;
    while ($row = mysql_fetch_array($query)) {
		if($i%5==1)
			echo "<tr>";			
        $res = "<th><input name='check";
		$res .= $i."' type='checkbox' ";
        $res .= "value='" . $row['ID_HUYEN'] . "'> ";
        $res .= $row['TEN_HUYEN'];
        $res .= "</th>";
        echo $res;
		$i++;
		if($i/5==0)
			echo "</tr>";
    }
}
?>