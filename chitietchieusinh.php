<?php
session_start();
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Chi tiết Chiêu Sinh </title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Plottage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
       
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
         <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
        <div class="clearfix"> </div>
        <br/>
        <div class="container">
            <div class="col-md-8 single-left">

                <div class="single-left3 events">

                    <?php
                    $qr = "SELECT * FROM chieusinh WHERE ID_CHIEUSINH = " . $ID_CHIEUSINH;
                    $query = mysql_query($qr);
                    $row_chieusinh = mysql_fetch_array($query);
                    ?>
                    <h3> <span><?php echo $row_chieusinh['TEN_CHIEUSINH']; ?> </span></h3>                       
                    <div id="chitietchiusinh">

                        <?php
                        echo $row_chieusinh['ND_CS'];
                        ?>

                    </div>
                    <h3>
                        <span>
                            Ngày mở:
                            <?php
                            echo $row_chieusinh['NGAYMO_CHIEUSINH'];
                            ?>
                        </span> 
                    </h3>
                  
                </div>
                <a href="dkl.php?p=<?php echo $ID_CHIEUSINH; ?>" ><div class="dk-chieusinh">ĐĂNG KÝ</div></a>
            </div>

            <div class="col-md-4 single-right events">

                <div class="related-posts">
                    <h3>Các khóa học khác</h3>
                    <?php
                    $nam_chieusinh = Hien5chieusinhNOTLIKE($ID_CHIEUSINH);
                    while ($row_5chieusinh = mysql_fetch_array($nam_chieusinh)) {
                        ?>
                        <div class="related-post">
                            <div class="related-post-left">
                                <a href="chitietchieusinh.php?q=<?php echo $row_5chieusinh["ID_CHIEUSINH"]; ?>"><img src="<?php
                                    $hinh = Hienhinh($row_5chieusinh["ID_IMG"]);
                                    $row_hinh = (mysql_fetch_array($hinh));
                                    echo $row_hinh["NAME_IMG"];
                                    ?>" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="related-post-right">
                                <h4><a href="chitietchieusinh.php?q=<?php echo $row_5chieusinh["ID_CHIEUSINH"]; ?>"><?php echo $row_5chieusinh["TEN_CHIEUSINH"]; ?></a></h4>
                                </p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <?php
                    }
                    ?>


                </div>
            </div>
            <div class="clearfix"> </div>

        </div>
        <!-- //single -->
        <!-- footer -->
        <?php
        require 'blocks/fotter_index.php';
        ?>
        <!-- //footer -->
        <!-- for bootstrap working -->
        <script src="../js/bootstrap.js"></script>
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
