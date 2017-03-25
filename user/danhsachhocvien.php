
<?php
require '../php/dbc.php';
if (isset($_GET["p"])) {
    $ID_LOP = $_GET["p"];
}
?> 
<!DOCTYPE HTML>
<html>
    <head>
        <title>Quang Trí|Danh Sách Học Viên</title>
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
        <!-- //lined-icons -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/amcharts.js"></script>	
        <script src="js/serial.js"></script>	
        <script src="js/light.js"></script>	
        <script src="js/radar.js"></script>	
        <link href="css/barChart.css" rel='stylesheet' type='text/css' />
        <link href="css/fabochart.css" rel='stylesheet' type='text/css' />
        <!--clock init-->
        <script src="js/css3clock.js"></script>
        <!--Easy Pie Chart-->
        <!--skycons-icons-->
        <script src="js/skycons.js"></script>
        <!--//skycons-icons-->
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
                        <!--//menu-right-->

                    </div>
                    <!-- //header-ends -->
                    <!--//outer-wp-->

                    <div class="outter-wp">
                        <!--/sub-heard-part-->
                        <div class="sub-heard-part">
                            <ol class="breadcrumb m-b-0">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Danh Sách lớp học</li>
                            </ol>
                        </div>	

                        <!-- tab content -->
                        <div class="col-md-12 tab-content tab-content-in">
                            <div class="tab-pane active text-style" id="tab1">
                                <div class="inbox-right">
                                    <div class="mailbox-content">
                                        <table class="table">
                                            <tbody>
                                                <?php
                                                $select = "Select * from dangkychieusinh inner join hocvien on dangkychieusinh.ID_HOCVIEN = hocvien.ID_HOCVIEN where ID_CHIEUSINH = $ID_LOP order by dangkychieusinh.ID_HOCVIEN DESC";
                                                $qr = mysql_query($select);
                                                while ($row = mysql_fetch_array($qr)) {
                                                    ?>
                                                    <tr class="table-row">

                                                        <td class="table-text">
                                                            <h6><?php echo $row['ID_HOCVIEN'] ?></h6>
                                                        </td>
                                                        <td class="table-text">
                                                            <h6><?php echo $row['TEN_HOCVIEN'] ?></h6>
                                                        </td>

                                                        <td >
                                                            <h6><?php echo $row['EMAIL__HOCVIEN'] ?></h6>
                                                        </td>
                                                        <td >
                                                            <h6><?php echo $row['SDT_HOCVIEN'] ?></h6>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div> 

                </div>

            </div>

            <!--//outer-wp-->
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