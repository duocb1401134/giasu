<?php
$sotin = 10;
if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    settype($trang, "int");
    if ($trang == 0) {
        $trang = 1;
    }
} else {
    $trang = 1;
}
$from = ($trang - 1) * $sotin;
// tổng số trang tin
$select = "SELECT * FROM `giasu` WHERE DUYET_GS = 1 order by ID_GS DESC";
$qr = mysql_query($select);
$tongsotin = mysql_num_rows($qr);
$tongsotrang = ceil($tongsotin / $sotin);

//tìm gia sư
if (isset($_POST['trinhdo'])) {
    $trinhdo = " gs.ID_TRINHDO= '" . $_POST['trinhdo'] . "'";
} else {
    $trinhdo = "";
}
if (isset($_POST['khoinganh'])) {
    $khoinganh = " gs.ID_KHOINGANH = '" . $_POST['khoinganh'] . "'";
} else {
    $khoinganh = "";
}
if (isset($_POST['tinh'])) {
    $tinh = "  dknd.ID_TINH = " . $_POST['tinh'];
} else
    $tinh = "";
if (isset($_POST['huyen'])) {
    $huyen = "  dknd.ID_HUYEN = " . $_POST['huyen'];
    $huyen1 = ", dangkynoiday dknd";
    $huyen2 = "gs.ID_GS = dknd.ID_GS";
} else {
    if (isset($_POST['tinh'])) {
        $huyen = " dknd.ID_HUYEN is NULL";
        $huyen1 = ", dangkynoiday dknd";
        $huyen2 = "gs.ID_GS = dknd.ID_GS";
    } else {
        $huyen = "";
        $huyen1 = "";
        $huyen2 = "";
    }
}
if (isset($_POST['lop'])) {
    $lop = " d.ID_LOP = '" . $_POST['lop'] . "'";
    //$lop1
    //$lop2
} else {
    $lop = "";
    $lop1 = "";
    $lop2 = "";
}
if (isset($_POST['monhoc'])) {
    $monhoc = " d.ID_MONHOC = '" . $_POST['monhoc'] . "'";
    $monhoc1 = ", day d";
    $monhoc2 = "gs.ID_GS = d.ID_GS";
} else {
    $monhoc = "";
    $monhoc1 = "";
    $monhoc2 = "";
}
?>
<div class="outter-wp">
    <!--/sub-heard-part-->
    <div class="sub-heard-part">
        <ol class="breadcrumb m-b-0">
            <li><a href="index.php?p=7">Danh sách gia sư</a></li>
            <li><a href="index.php?p=8">Phê duyệt dạy</a></li>
            <li>Danh Sách gia đã duyệt</li>
        </ol>
    </div>
    <div class="container">
        <form method="POST">
            <div class="col-md-2">
                <div style="width:185px;" class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                    <select id="trinhdo" name="trinhdo" class="form-control">
                        <option selected="selected" disabled="disabled">-- Trình độ --</option>
<?php
$qr = "SELECT * FROM `trinhdo`";
$query = mysql_query($qr);
while ($row_trinhdo = mysql_fetch_array($query)) {
    echo "<option value='" . $row_trinhdo['ID_TRINHDO'] . "'>" . $row_trinhdo['TEN_TRINHDO'] . "</option>";
}
?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div style="width:185px;" class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                    <select id="khoinganh" name="khoinganh" class="form-control">
                        <option selected="selected" disabled="disabled">-- Khối ngành --</option>
                        <?php
                        $qr = "SELECT * FROM `khoinganh`";
                        $query = mysql_query($qr);
                        while ($row_trinhdo = mysql_fetch_array($query)) {
                            echo "<option value='" . $row_trinhdo['ID_KHOINGANH'] . "'>" . $row_trinhdo['TEN_KHOINGANH'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div style="width:185px;" class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                    <select id="tinh" name="tinh" class="form-control tinh">
                        <option selected="selected" disabled="disabled">-- Tỉnh --</option>
<?php
$qr = "SELECT * FROM `tinh`";
$query = mysql_query($qr);
while ($row_trinhdo = mysql_fetch_array($query)) {
    echo "<option value='" . $row_trinhdo['ID_TINH'] . "'>" . $row_trinhdo['TEN_TINH'] . "</option>";
}
?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div style="width:185px;" class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                    <select id="huyen" name="huyen" class="form-control huyen">
                        <option selected="selected" disabled="disabled">-- Huyện --</option>
                    </select>
                </div>
            </div>
            <div class="col-md-1">
                <div style="width:95px; padding-right:5px;" class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                    <select name="lop" id="lop" class="form-control lop">
                        <option selected="selected" disabled="disabled">--Lớp--</option>
                        <?php
                        $qr = "SELECT * FROM `lop`";
                        $query = mysql_query($qr);
                        while ($row_trinhdo = mysql_fetch_array($query)) {
                            echo "<option value='" . $row_trinhdo['ID_LOP'] . "'>" . $row_trinhdo['TEN_LOP'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div style="width:180px;" class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                    <select id="monhoc" name="monhoc" class="form-control mon">
                        <option selected="selected" disabled="disabled">-- Môn học --</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div  class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">

                    <input class="form-control" id="btnTimkiem" name="btnTimkiem" style="border-radius: 6px; padding: 9px; padding-top:0em;" type="submit" value="Tìm kiếm">

                </div>
            </div>

        </form>
    </div>
    <div class="col-md-12 tab-content tab-content-in">
        <div class="tab-pane active text-style" id="tab1">
            <div class="inbox-right">
                <div class="mailbox-content">
                    <div>

                        <table class="table">
                            <tbody>
<?php
//tim kiem gia su
if (isset($_POST["btnTimkiem"])) {
    $y = 0;

    $qr = "SELECT * FROM giasu gs $monhoc1 $huyen1 WHERE ";

    if ($monhoc2 != "") {
        if ($y > 0) {
            $qr = $qr . "AND $monhoc2 ";
            $y++;
        } else {
            $qr = $qr . " $monhoc2 ";
            $y++;
        }
    }
    if ($huyen2 != "") {
        if ($y > 0) {
            $qr = $qr . "AND $huyen2 ";
            $y++;
        } else {
            $qr = $qr . " $huyen2 ";
            $y++;
        }
    }
    $j = 0;
    if ($trinhdo != "") {
        if (($j > 0) || ($y > 0)) {
            $qr = $qr . " AND $trinhdo";
            $j++;
        } else {
            $qr = $qr . " $trinhdo";
            $j++;
        }
    }
    if ($khoinganh != "") {
        if (($j > 0) || ($y > 0)) {
            $qr = $qr . " AND $khoinganh";
            $j++;
        } else {
            $qr = $qr . " $khoinganh";
            $j++;
        }
    }
    if ($huyen != "") {
        if (($j > 0) || ($y > 0)) {
            $qr = $qr . " AND $huyen";
            $j++;
        } else {
            $qr = $qr . " $huyen";
            $j++;
        }
    }
    if ($monhoc != "") {
        if (($j > 0) || ($y > 0)) {
            $qr = $qr . " AND $monhoc";
            $j++;
        } else {
            $qr = $qr . " $monhoc";
            $j++;
        }
    }
    $qr = $qr . " AND gs.DUYET_GS = 1 order by gs.ID_GS DESC LIMIT $from,$sotin";
    if (($trinhdo == "") && ($khoinganh == "") && ($tinh == "") && ($huyen == "") && ($lop == "") && ($monhoc == ""))
        $qr = "SELECT * FROM giasu INNER JOIN image ON giasu.ID_IMG = image.ID_IMG WHERE DUYET_GS = 1 order by ID_GS DESC LIMIT $from,$sotin";
    //echo $qr;
}
else {
    $qr = "SELECT * FROM giasu INNER JOIN image ON giasu.ID_IMG = image.ID_IMG WHERE DUYET_GS = 1 order by ID_GS DESC LIMIT $from,$sotin";
    //echo $qr;
}
$query = mysql_query($qr);
while ($row = mysql_fetch_array($query)) {
    if (isset($_POST['btnTimkiem'])) {
        $qr1 = "SELECT * FROM image WHERE ID_IMG = " . $row['ID_IMG'];
        $query1 = mysql_query($qr1);
        $row_hinh = mysql_fetch_array($query1);
    }
    ?>
                                    <tr class="table-row">
                                        <td>
                                            <img width="200px" height="auto" src="<?php if (!isset($_POST['btnTimkiem'])) echo $row['NAME_IMG'];
                                else echo $row_hinh['NAME_IMG']; ?>" alt="" />
                                        </td>
                                        <td class="table-text">
                                            <h6><?php echo $row['TEN_GS'] ?></h6>
                                            <p><?php echo $row['GIOITHIEU_GS'] ?></p>
                                        </td>  
                                        <td >
                                            <a href="admin/xoags_moi.php?p=<?php echo $row['ID_GS']; ?>"> Xóa </a>
                                        </td>
                                        <td >
                                            <a href="admin/xemgs.php?p=<?php echo $row['ID_GS']; ?>"> Chi Tiết </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--phân trang-->
                        <nav style="text-align: center;">
                            <ul class="pagination">
                                <li class="<?php if ($i == 0) echo 'disabled'; ?>">
                                    <a href="index.php?p=9&i=<?php
                                if (isset($_GET["i"])) {
                                    $i = $_GET["i"];
                                    $i = $i - 5;
                                } else {
                                    $i = 0;
                                }
                                if ($i < 0) {
                                    $i = 0;
                                } echo $i;
                                ?>&trang=<?php
                                if ($i == 0) {
                                    echo $i + 1;
                                } else {
                                    echo $i;
                                }
                                ?>"><span aria-hidden="true">&laquo;</span></a></li>
                                <?php
                                for ($j = 1; $j <= 5; $j++) {
                                    $i++;
                                    ?>
                                    <li><a href="index.php?p=9&i=<?php
                                    if ($i % 5 == 0) {
                                        echo $i;
                                    } else {
                                        $temb = (int) ($i / 5);
                                        echo (($temb * 5) + 5);
                                    }
                                    ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php }
                                    ?>
                                <li class="<?php if ($i >= $tongsotrang) echo 'disabled'; ?>">
                                    <a href="index.php?p=9&i=<?php echo $i = $i + 5; //if ($i >= $tongsotrang){echo $i;} //else {echo $i = $i + 5;}     ?>&trang=<?php echo $i - 4; ?>"><span aria-hidden="true">&raquo;</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"> </div> 
<br/>