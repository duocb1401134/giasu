<?php

require 'dbc.php';
if (isset($_GET["p"])) {
    $ID = $_GET["p"];
    $update = "UPDATE `giasu` SET `DUYET_GS`=0, `DAXEM_GS`=1 WHERE ID_GS=$ID";
    mysql_query($update);
    sleep(1);
    header('location: chitietgs.php?p=' . $ID);
}
