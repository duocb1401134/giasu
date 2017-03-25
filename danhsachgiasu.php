<?php
session_start();
require 'php/dbc.php';
require 'php/menu.php';
require 'php/code_danhsachgiasu.php';
require 'php/code_index.php';
$p = 3;
//phân trang
$sotin1trang = 10;
if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    settype($trang, "int");
    if ($trang == 0) {
        $trang = 1;
    }
} else {
    $trang = 1;
}
$from = ($trang - 1) * $sotin1trang;
// tổng số tin
$t = Hien_allgiasu();
$tongsotin = mysql_num_rows($t);
$tongsotrang = ceil($tongsotin / $sotin1trang);
//lấy giá trị biến i
if (isset($_GET["i"])) {
    $i = $_GET["i"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Gia Sư - Quang Trí</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Plottage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/light-carousel.css" rel="stylesheet" type="text/css">
        <!-- js -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <!-- //js -->
        <link href='//fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <script type="text/javascript">

            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- hiện lớp--> 
        <script type="text/javascript" src="js/ajax-monhoc.js"></script>

    </head>

    <body>
        <!-- header -->
        <?php
        if (!isset($_SESSION["ID_GS"])) {
            require 'blocks/menu-login-before.php';
        } else {
            require 'blocks/menu-login-after.php';
        }
        ?>
        <!-- //header -->        
        <div class="col-md-8 single-left events">
            <h3><span>Gia sư</span></h3>
            <p class="autem">Danh sách gia sư của trung tâm</p>
            <br/>
            <form method="POST">
                <div class="col-md-3">
                    <div class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                        <span class="input-group-addon" id="sizing-addon1">Tỉnh</span>
                        <select id="select_tinh" name="select_tinh" class="form-control">
                            <option selected="selected" disabled="disabled">-- Tỉnh --</option>
                            <?php
                            $tinh = Hientinh();
                            while ($row_tinh = mysql_fetch_array($tinh)) {
                                ?>
                                <option value="<?php echo $row_tinh['ID_TINH']; ?>"><?php echo $row_tinh['TEN_TINH']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                        <span class="input-group-addon" id="sizing-addon1">Lớp</span>
                        <select id="select_lop" name="select_lop" class="form-control lop">
                            <option disabled="disabled" selected="selected">-- Lớp --</option>
                            <?php
                            $lop = Hienlop();
                            while ($row_lop = mysql_fetch_array($lop)) {
                                ?>
                                <option value="<?php echo $row_lop['ID_LOP']; ?>"><?php echo $row_lop['TEN_LOP']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group input-group-lg animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                        <span class="input-group-addon" id="sizing-addon1">Môn</span>
                        <select id="select_monhoc" name="select_monhoc" class="form-control mon">
                            <option disabled="disabled" selected="selected">-- Môn học --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-contact">
                        <input id="btnTimkiem" name="btnTimkiem" style="width: 100px ;border-radius: 6px; padding: 9px;" type="submit" value="Tìm kiếm">
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
            <div class="single-left3">
                <table class="table">
                    <tbody>
                        <?php
                        // tìm gia sư
                        if (isset($_POST["btnTimkiem"])) {
                            if (!isset($_POST["select_monhoc"])) {
                                $monhoc = null;
                            } else
                                $monhoc = $_POST["select_monhoc"];
                            if (!isset($_POST["select_lop"])) {
                                $lop = null;
                            } else
                                $lop = $_POST["select_lop"];
                            if (!isset($_POST["select_tinh"])) {
                                $tinh = null;
                            } else
                                $tinh = $_POST["select_tinh"];
                            if (($tinh == null) && ($lop == null) && ($monhoc == null)) {
                                echo '<p class="autem" style="color:red; font-weight:bold;">Bạn chưa chọn thông tin tìm kiếm</p>';
                            } else {
                                $giasu = Timkiem_GS($from, $sotin1trang, $monhoc, $tinh);
                                if (mysql_num_rows($giasu) == 0)
                                    echo '<p class="autem" style="color:red; font-weight:bold;">Không tìm được gia sư theo yêu cầu</p>';
                            }
                        }
                        else {
                            $giasu = Hiengiasu_phantrang($from, $sotin1trang);
                            if (mysql_num_rows($giasu) == 0)
                                echo '<p class="autem" style="color:red; font-weight:bold;">Không có gia sư nào cả</p>';
                        }
                        //echo mysql_num_rows($giasu);
                        if (mysql_num_rows($giasu) != 0) {
                            while ($row_giasu = mysql_fetch_array($giasu)) {
                                ?>
                                <tr class="table-row">
                                    <td class="table-img">
                                        <img src="user/<?php
                                        $avt = Hienhinh($row_giasu["ID_IMG"]);
                                        $row_avt = mysql_fetch_array($avt);
                                        echo $row_avt["NAME_IMG"];
                                        ?>" style="width:150px; height: auto;" alt="" />
                                    </td>
                                    </td>
                                    <td class="table-text">
                                        <h6><a href="CT_GS.php?q=<?php echo $row_giasu["ID_GS"]; ?>"><?php echo $row_giasu["TEN_GS"]; ?></a></h6>
                                        <p><?php echo $row_giasu["GIOITHIEU_GS"]; ?></p>
                                    </td>
                                    <td>
                                        <span class="fam"><a href="CT_GS.php?q=<?php echo $row_giasu["ID_GS"]; ?>"> Chi Tiết </a></span>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="related-posts events">
                <h3>Các tin tức mới</h3>
                <?php
                $nam_tintuc = Hien5tinnho();
                while ($row_5tintuc = (mysql_fetch_array($nam_tintuc))) {
                    ?>
                    <div class="related-post">
                        <div class="related-post-left">
                            <a href="tintucchitiet.php?q=<?php echo $row_5tintuc["ID_TT"]; ?>">
                                <img src="<?php
                                $hinh = Hienhinh($row_5tintuc["ID_IMG"]);
                                $row_hinh = (mysql_fetch_array($hinh));
                                echo $row_hinh["NAME_IMG"];
                                ?>" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="related-post-right">
                            <h4><a href="tintucchitiet.php?q=<?php echo $row_5tintuc["ID_TT"]; ?>"><?php echo $row_5tintuc["TIEUDE_TT"]; ?></a></h4>
                            <p><?php echo $row_5tintuc["GIOITHIEU"]; ?>
                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <hr>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="clearfix"> </div>
        <!--phân trang-->
        <nav style="text-align: center;">
            <ul class="pagination">
                <li class="<?php if ($i == 0) echo 'disabled'; ?>">
                    <a href="danhsachgiasu.php?i=<?php
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
                    <li><a href="danhsachgiasu.php?i=<?php
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
                    <a href="danhsachgiasu.php?i=<?php echo $i = $i + 5; //if ($i >= $tongsotrang){echo $i;} //else {echo $i = $i + 5;}       ?>&trang=<?php echo $i - 4; ?>"><span aria-hidden="true">&raquo;</span></a></li>
            </ul>
        </nav>           
        <!-- //single -->
        <!-- footer -->
        <?php
        require 'blocks/fotter_index.php';
        ?>
        <!-- //footer -->
        <!-- for bootstrap working -->
        <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function () {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear' 
                 };
                 */

                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <!-- //here ends scrolling icon -->
    </body>
</html>
