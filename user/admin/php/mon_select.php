<?php
    function ten_mh($id_mh){
        $qr = "Select * from monhoc where `ID_MONHOC`= '$id_mh'";
        $result = mysql_query($qr);
        return mysql_fetch_array($result)['TEN_MONHOC'];
    }