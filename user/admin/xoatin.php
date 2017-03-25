<?php

require 'dbc.php';
?>
<?php

if (isset($_GET["p"])) {
    $ID = $_GET["p"];
    
    $delete = "DELETE FROM `tintuc` WHERE ID_TT = $ID";
    mysql_query($delete);
    sleep(1);
    header('location: ../index.php?p=12');
}
?> 
