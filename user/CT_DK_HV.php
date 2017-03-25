<?php
require '../php/dbc.php';
require '../php/code_index.php';
require 'php/CT_DK_HV.php';
require 'admin/php/mon_select.php';
if (isset($_GET["p"])) {
    $ID_HV = $_GET["p"];
}
?> 
<!DOCTYPE HTML>
<html>
    <head>
        <title>Quang Trí| Chi tiết đăng ký</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>  
        <meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
        <!-- /js -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <!-- //js-->
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
                    <!--outter-wp-->
                    <div class="outter-wp">
                        <div class="graph-visual tables-main">
                            <h3 class="inner-tittle two"> <center> ID:  <?php echo ct_dk_ml($ID_HV)['ID_HOCVIEN'] . '<br/> Tên: ' . ct_dk_ml($ID_HV)['TEN_HOCVIEN'] ?> </center> </h3>
                            <div class="graph">
                                <div class="tables">
                                    <table class="table">
                                        <tbody> 
                                            <tr class="active"> 
                                                <th scope="row">Số Điện Thoại</th> 
                                                <td> <?php echo ct_dk_ml($ID_HV)['SDT_HOCVIEN']; ?></td> 
                                            </tr> 
                                            <tr> 
                                                <th scope="row">Email</th> 
                                                <td><?php echo ct_dk_ml($ID_HV)['EMAIL__HOCVIEN'] ?></td>
                                            </tr> 
                                            <tr class="success"> 
                                                <th scope="row">Địa chỉ</th> 
                                                <td><?php echo ct_dk_ml($ID_HV)['DIACHI_HOCVIEN'] ?></td> 
                                            </tr> 
                                            <tr> 
                                                <th scope="row">Môn Đăng ký</th> 
                                                <td><?php echo ten_mh(ct_dk_ml($ID_HV)['DK_MON']) ?>                                            
                                                </td>  
                                            </tr> 
                                            <tr class="info">
                                                <th scope="row"> Gia sư đăng ký </th>
                                                <td>
                                                    <a href="chitietgs.php?p=<?php echo ct_dk_ml($ID_HV)['ID_GS'] ?>">
                                                        <?php
                                                        if (ct_dk_ml($ID_HV)['ID_GS'] != NULL) {
                                                            echo ct_dk_ml($ID_HV)['ID_GS'] . ' --- ' . ten_gs(ct_dk_ml($ID_HV)['ID_GS']);
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr class="warning"> 
                                                <th scope="row">Yêu Cầu</th> 
                                                <td><?php echo ct_dk_ml($ID_HV)['YEUCAU'] ?></td>                                                 
                                            </tr> 
                                            <tr class="danger"> 

                                            </tr>
                                        </tbody> 
                                    </table> 
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--//outer-wp-->


                    <!--footer section start-->
                    <?php
                    require 'blocks/fotter.php';
                    ?>
                    <!--//footer section end-->
                </div>
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