<?php
require '../php/dbc.php';
//require '../php/code_user.php';
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = "";
}
if (isset($_GET['q'])) {
    $q = $_GET['q'];
} else {
    $q = "";
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin Quang Trí</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- Graph CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <!----->
        <script src="js/modernizr.custom.04022.js"></script>
        <script src="js/jquery.chocolat.js"></script>
        <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
        <!--light-box-files -->
        <script type="text/javascript">
            $(function () {
                $('.gallery-bottom a').Chocolat();
            });
        </script>
        <!--code hiện môn học của lớp-->
        <script src="user/js/ajax-monhoc.js"></script>
        <script src="admin/js/ajax-monhoc-admin.js"></script>
        <script src="admin/js/ajax-huyen-admin.js"></script>
        <script language="javascript" type="text/javascript" src="js/ckeditor/ckeditor.js"> </script>


        <!--clock init-->
    </head> 
    <body>
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content">
                <div class="inner-content">
                    <!-- header-starts -->
                    <div class="header-section">
                        <!--menu-right-->
                        <?php
                        require 'blocks/menu_top.php';
                        ?>
                        <!--//menu-right-->
                        <div class="clearfix"></div>
                    </div>
                    <!-- //header-ends -->

                    <?php
                    switch ($p) {
                        case '1':require 'admin/kemtainha.php';
                            break;
                        case '2' : require 'admin/dangkymolop.php';
                            break;                            
                        case '3' : require 'admin/hocviendangkygs.php';
                            break;                            
                        case '4' : require 'admin/hocviendkchieusinh.php';
                            break;                            
                        case '5': require 'admin/molop.php';
                            break;
                        case '6': require 'admin/danhsachlop.php';
                            break;
                        case '7': require 'admin/danhsachgiasu.php';
                            break;
                        case '8' :require 'admin/danhsachGS-chuaduyet.php';
                            break;
                        case '9' :require 'admin/danhsachGS-daduyet.php';
                            break;
                        case '10' :require 'admin/themlop.php';
                            break;
                        case '11' :require 'admin/themmonvaolop.php';
                            break;
                        case '12' :require 'admin/danhsachtintuc.php';
                            break;
                        default : require 'admin/molop.php';
                    }
                    ?>

                    <!--//outer-wp-->
                </div>
                <!--footer section start-->
                <?php
                require 'blocks/fotter.php';
                ?>
                <!--footer section end-->
            </div>

            <!--//content-inner-->
            <!--/sidebar-menu-->
            <?php
            require 'blocks/menu_right.php';
            ?>
            <div class="clearfix"></div>		
        </div>
        <script>
            var toggle = true;

            $(".sidebar-icon").click(function () {
                if (toggle)
                {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({"position": "absolute"});
                } else
                {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function () {
                        $("#menu span").css({"position": "relative"});
                    }, 400);
                }

                toggle = !toggle;
            });
        </script>
        <!--js -->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>