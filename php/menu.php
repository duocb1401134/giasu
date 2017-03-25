<?php

function menu_trangchu($p) {
    if ($p == 1) {
        echo 'class="active"';
    }
}

function menu_tintuc($p) {
    if ($p == 2) {
        echo 'class="active"';
    }
}

function menu_giasu($p) {
    if ($p == 3) {
        echo 'class="active"';
    }
}

function menu_dangkygs($p) {
    if ($p == 7) {
        echo 'class="active"';
    }
}

function menu_chieusinh($p) {
    if ($p == 4) {
        echo 'class="active"';
    }
}

function menu_hocphi($p) {
    if ($p == 5)
        echo 'class="active"';
}

function menu_dangnhap($p) {
    if ($p == 6)
        echo 'class="active"';
}

?>
