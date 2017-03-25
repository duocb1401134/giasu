<?php
require 'dbc.php';
?>
<?php
if (isset($_GET["p"])) {
    $ID = $_GET["p"];
    
    $delete_dk = "DELETE FROM `dangkygiasu` WHERE ID_GS = $ID";
    mysql_query($delete_dk);
    
    $delete_noiday = "DELETE FROM `dangkynoiday` WHERE ID_GS = $ID";
    mysql_query($delete_noiday);
    
    $delete_day = "DELETE FROM `day` WHERE ID_GS = $ID";
    mysql_query($delete_day);
    
    $delete_chieusinh_ = "DELETE FROM `chieusinh` WHERE ID_GS = $ID";
    mysql_query($delete_chieusinh_);
    
    $delete_chieusinh = "DELETE FROM `dangkychieusinh` WHERE ID_GS = $ID";
    mysql_query($delete_chieusinh);
    
    $delete_buoiday = "DELETE FROM `buoitrongngay` WHERE ID_GS = $ID";
    mysql_query($delete_buoiday);
   
    $delete_gs = "DELETE FROM `giasu` WHERE ID_GS = $ID";
    
    $qr = mysql_query($delete_gs);
    
   
    
   sleep(1);
    header('location: ../index.php?p=7');
}
