<?php

// Hi?n 5 tin nh? không trùng v?i tin dang xem
function Hien5chieusinhNOTLIKE($ID_CHIEUSINH) {
    $qr = "SELECT * FROM chieusinh WHERE ID_CHIEUSINH NOT LIKE $ID_CHIEUSINH LIMIT 0,5";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
} 
?>

