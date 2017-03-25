<?php
session_start();
require 'php/dbc.php';
require 'php/menu.php';
require 'php/code_tintucchitiet.php';
require 'php/code_danhsachgiasu.php';
$p = 2;
if (isset($_GET['q'])) {
    $ID_TT = $_GET['q'];
} else {
    $ID_TT = "";
}
?>  
<!DOCTYPE html>
<html>
    <head>
        <title> Chi tiết tin tức - Quang Trí </title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Plottage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

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


        <div class="single">
            <div class="container">

                <div class="col-md-8 single-left events" id="tintuc">

                    <div class="single-left3">
                        <?php
                        $tintuc = tintuc($ID_TT);
                        $row_tintuc = mysql_fetch_array($tintuc);
                        $tintucchitiet = tintucchitiet($ID_TT);
                        ?>
                        <h1> <?php echo $row_tintuc['TIEUDE_TT']; ?> </h1>
                        <p>
                            <?php
                            while ($row_tintucchitiet = mysql_fetch_array($tintucchitiet)) {
                                ?>
                                <span class="thumbnails">
                                   <?php
                                    $hinh = Hienhinh($row_tintucchitiet['ID_IMG']);
                                    $row_hinh = mysql_fetch_array($hinh);                                    
                                    ?>
                                </span>
                            <h6>
                                <?php
                                echo $row_hinh['MOTA'];
                                ?>
                            </h6>
                            <span>
                                <?php
                                echo $row_tintucchitiet['NOIDUNG_TT'];
                                ?>
                            </span> 
                            <?php
                        }
                        ?>
                        </p>

                    </div>

                </div>
 
                <div class="col-md-4 single-right">

                    <div class="related-posts events" id="ttcungloai">
                        <h3>Tin tức cùng loại</h3>
                        <?php
                        $nam_tintuc = Hien5tinnhoNOTLIKE($ID_TT);
                        while ($row_5tintuc = (mysql_fetch_array($nam_tintuc))) {
                            ?>
                            <div class="related-post">
                                <div class="related-post-left">
                                    <a href="tintucchitiet.php?q=<?php echo $row_5tintuc["ID_TT"]; ?>"><img src="<?php
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
                            <?php
                                        echo '<hr/>';
                        }
                        ?>


                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
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
