<?php

require 'dbc.php';
if (isset($_GET["p"])) {
    $ID_LOP = $_GET["p"];
    $delete_dk = "DELETE FROM `dangkychieusinh` WHERE ID_CHIEUSINH = $ID_LOP";
    mysql_query($delete_dk);
    $delete_lop = "DELETE FROM `chieusinh` WHERE ID_CHIEUSINH = $ID_LOP";
    mysql_query($delete_lop);
    sleep(1);
    header('location: index.php?p=2');
}
