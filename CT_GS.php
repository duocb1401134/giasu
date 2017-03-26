<?php
session_start();
require_once 'libs/tutor.php';
require_once 'libs/image.php';
require_once 'libs/education.php';
require_once 'libs/teach.php';
require 'php/menu.php';
$p = 3;
//lấy giá trị ID_GS
if (isset($_GET["q"])) {
    $ID_GS = $_GET["q"];
}
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Chi tiết Gia Sư</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Plottage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <!-- js -->
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
        $_tutor = new Tutor();
        $row = $_tutor->select_once_tutor($ID_GS);
        ?>
        <div class="contact">
            <div class="container"
                 <div class="contact-grid1">
                    <div class="col-md-3 contact-grid1-left">
                        <div class="contact-grid1-left1">
                            <span aria-hidden="true" class="image"> <img src="
                                <?php
                                $img = new Image();
                                $img_name = $img->select_once($row['ID_IMG']);
                                echo $img_name['NAME_IMG'];
                                ?>" 
                                                                         class="img-responsive" style="width: 200px; height: auto;">
                            </span>                            
                            <nav class="nav-sidebar" style=" margin-top: 10px;">
                                <ul class="nav tabs">
                                    <li>
                                        <a href="dkgs.php?gs=<?php echo $_GET['q']; ?>"><center> <h2>  Đăng ký gia sư này</h2> </center></a>
                                    </li>
                                    <!--                                    <li  style="margin-bottom:0px">
                                                                            <a href="#gioithieu"><input type="submit" style="width: 100%;padding: 10px 10px 10px 10px;" class="btn-timkiem" value="Tự Giới Thiệu"/></a> 
                                                                        </li>
                                                                        <li  style="margin-bottom:0px">
                                                                            <a href="#monday"><input type="submit" style="width: 100%;padding: 10px 10px 10px 10px;" class="btn-timkiem" value="Môn Đăng ký"/></a> 
                                                                        </li>-->
                                </ul>
                            </nav>	
                        </div>
                    </div>
                    <div class="col-md-6 contact-grid1-left">    
                        <div class="contact-grid1-left1"> 
                            <h1 style="text-align:center; margin: 10px;">Thông tin gia sư</h1>
                            <hr>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td class="table-text">ID Gia sư:</td>
                                        <td class="table-text"><?php echo $row["ID_GS"]; ?></td>
                                    </tr>                                
                                    <tr class="table-text">
                                        <td>Họ tên:</td>
                                        <td><?php echo $row["TEN_GS"]; ?></td>
                                    </tr>    
                                    <tr>
                                        <td>Ngày sinh:</td>
                                        <td><?php echo $row["NGAYSINH_GS"]; ?></td>
                                    </tr>
                                    <tr class="table-text"> 
                                        <td>Giới tính:</td>
                                        <td><?php
                                            if ($row["GIOITINH_GS"] == 1) {
                                                echo 'Nam';
                                            } else {
                                                echo 'Nữ';
                                            }
                                            ?>   
                                        </td>
                                    </tr>
                                    <tr class="table-text" id="gioithieu">
                                        <td>Giới thiệu:</td>
                                        <td>
                                            <?php echo $row["GIOITHIEU_GS"]; ?> 
                                        </td>
                                    </tr>

                                    <tr class="table-text">
                                        <td>Chuyên ngành:</td>
                                        <td>
                                            <?php echo $row["CHUYENNGANH_GS"]; ?>                                       
                                        </td>
                                    </tr>                               
                                    <tr>
                                        <td>Trình độ:</td>
                                        <td>
                                            <?php
                                            $edu = new Education();
                                            echo $edu->select_once($row["ID_TRINHDO"])["TEN_TRINHDO"];
                                            ?>
                                        </td>
                                    </tr>
                                    <tr id="monday">                                
                                        <td>Môn dạy:</td>
                                        <td> 
                                            <?php
                                                $teach  = new Teach();
                                                
                                                if(count($teach->select_all($row["ID_GS"]))>0){
                                                    foreach($teach->select_all($row["ID_GS"]) as $row){
                                                        echo $row["TEN_MONHOC"].' - '.$row['ID_LOP'];
                                                        echo "<br/>";
                                                    }
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Thời gian biểu:</td>
                                        <td> 
                                            <?php
//                                            $buoi = Hienbuoi_GS($row_giasu["ID_GS"]);
//                                            $row_buoi = mysql_fetch_array($buoi);
//                                            for ($i = 2; $i <= 7; $i++) {
//                                                $thu = "ST" . $i;
//                                                if ($row_buoi[$thu] == 1)
//                                                    echo "Sáng thứ " . $i . "</br>";
//                                            }
//                                            if ($row_buoi["SCN"] == 1)
//                                                echo "Sáng chủ nhật</br>";
//                                            for ($i = 2; $i <= 7; $i++) {
//                                                $thu = "CT" . $i;
//                                                if ($row_buoi[$thu] == 1)
//                                                    echo "Chiều thứ " . $i . "</br>";
//                                            }
//                                            if ($row_buoi["CCN"] == 1)
//                                                echo "Chiều chủ nhật</br>";
//                                            for ($i = 2; $i <= 7; $i++) {
//                                                $thu = "TT" . $i;
//                                                if ($row_buoi[$thu] == 1)
//                                                    echo "Tối thứ " . $i . "</br>";
//                                            }
//                                            if ($row_buoi["TCN"] == 1)
//                                                echo "Tối chủ nhật</br>";
                                            ?>

                                        </td>

                                    </tr>
<!--                                    <tr>
                                        <td>Nơi đăng ký dạy:</td>
                                        <td> 
                                    <?php
//                                    $dangkynoiday = Hiendangkynoiday_GS($row_giasu["ID_GS"]);
//                                    while ($row_dangkynoiday = mysql_fetch_array($dangkynoiday)) {
//                                        $huyen = Hienhuyen_GS($row_dangkynoiday["ID_HUYEN"]);
//                                        $row_huyen = mysql_fetch_array($huyen);
//                                        $tinh = Hientinh_GS($row_dangkynoiday["ID_TINH"]);
//                                        $row_tinh = mysql_fetch_array($tinh);
//                                        if ($row_huyen["TEN_HUYEN"] != NULL)
//                                            echo $row_huyen["TEN_HUYEN"] . " - ";
//                                        echo $row_tinh["TEN_TINH"] . "</br>";
//                                    }
                                    ?>

                                        </td>
                                    </tr>   -->
                                </tbody>
                            </table>
                        </div>
                    </div>    


                </div>
            </div>



            <!-- //mail -->
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
