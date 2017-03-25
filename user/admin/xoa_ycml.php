<?php
require 'dbc.php';
?>
<?php
if (isset($_GET["p"])) {
    $ID = $_GET["p"];
    
    $delete_dk = "DELETE FROM `hocvien` WHERE ID_HOCVIEN = $ID";
    mysql_query($delete_dk);
    
    sleep(1);
    header('location: ../index.php?p=2');
}