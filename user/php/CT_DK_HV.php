<?php

function ct_dk_ml($id_hv) {
    $query = "select * from hocvien where ID_HOCVIEN = '$id_hv'";
    $result = mysql_query($query);
    return mysql_fetch_array($result);
}
function ten_gs($id_gs){
    $query ="select * from giasu where ID_GS = '$id_gs'";
    $result = mysql_query($query);
    return mysql_fetch_array($result)['TEN_GS'];
}
