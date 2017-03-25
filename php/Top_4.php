<?php
function Top4_GS(){
    $qr ="SELECT * FROM giasu WHERE DUYET_GS=1 Order by ID_GS DESC LIMIT 0,4";
    return mysql_query($qr);
    mysql_set_charset($qr, 'UTF8');
}