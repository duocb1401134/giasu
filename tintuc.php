<?php
session_start();
require 'php/dbc.php';
require 'php/menu.php';
require 'php/code_tintuc.php';
require 'php/code_danhsachgiasu.php';
$p = 2;
//phân trang
$sotin1trang = 8;
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
$t = Hien_alltintuc();
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
        <title>Tin Tức - Quang Trí</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>  
        <meta name="keywords" content="Plottage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <!-- //js -->
        <link href='//fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- start-smoth-scrolling -->

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
        <!-- special-services -->

        <div class="events">
            <h3><span>Tin tức mỗi ngày</span></h3>
            <p class="autem">Thông tin tri thức bổ ích trong tầm tay</p>
            <div class="special-services-grids">
                <?php
                $tintuc = Hientintuc_phantrang($from, $sotin1trang);
                if (mysql_num_rows($tintuc) == 0)
                    echo '<p class="autem" style="color:red; font-weight:bold;">Không có tin tức nào cả</p>';
                $i = 0;
                while ($row_tintuc = mysql_fetch_array($tintuc)) {
                    $i++;
                    ?>
                    <div class="col-md-3 special-services-grid">
                        <div class="special-services-grid1">
                            <a href="tintucchitiet.php?q=<?php echo $row_tintuc["ID_TT"]; ?>" class="more-sub hvr-bounce-to-bottom hvr-bounce-to-bottom1">
                                <img style="width:360; height:175;" src="<?php
                                $avt = Hienhinh($row_tintuc["ID_IMG"]);
                                $row_avt = mysql_fetch_array($avt);
                                echo $row_avt["NAME_IMG"];
                                ?>" alt=" " class="img-responsive" />
                            </a>
                        </div>
                        <h4>
                            <a href="tintucchitiet.php?q=<?php echo $row_tintuc["ID_TT"]; ?>">
                                <?php echo $row_tintuc["TIEUDE_TT"]; ?></a></h4>
                        <p><?php echo $row_tintuc["GIOITHIEU"]; ?></p>
                        <div class="m2">
                            <a href="tintucchitiet.php?q=<?php echo $row_tintuc["ID_TT"]; ?>" class="more-sub hvr-bounce-to-bottom hvr-bounce-to-bottom1">Xem chi tiết</a>
                        </div>
                    </div>


                    <?php
                    if ($i % 4 == 0)
                        echo '<div class="clearfix"> </div>';
                }
                ?>

                <div class="clearfix"> </div>
            </div><!--phân trang-->
            <nav style="text-align: center;">
                <ul class="pagination">
                    <li class="<?php if ($i == 0) echo 'disabled'; ?>"><a href="tintuc.php?i=<?php
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
                        <li><a href="tintuc.php?i=<?php
                            if ($i % 5 == 0) {
                                echo $i;
                            } else {
                                $temb = (int) ($i / 5);
                                echo (($temb * 5) + 5);
                            }
                            ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php }
                        ?>
                    <li class="<?php if ($i >= $tongsotrang) echo 'disabled'; ?>"><a href="tintuc.php?i=<?php echo $i = $i + 5; //if ($i >= $tongsotrang){echo $i;} //else {echo $i = $i + 5;}         ?>&trang=<?php echo $i - 4; ?>"><span aria-hidden="true">&raquo;</span></a></li>
                </ul>
            </nav>
        </div>

        <!-- //special-services -->

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
