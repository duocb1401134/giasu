<?php
session_start();
require '../php/dbc.php';
require '../php/code_index.php';
require '../php/code_danhsachgiasu.php';
require '../user/php/code_user.php';
require '../php/giasu.php';
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = "";
}
?>
<?php
$user = CT_GS($_SESSION["ID_GS"]);
$row_user = mysql_fetch_array($user);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Quang Trí| Cập nhật thông tin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>  
        <meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/tab.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <!--code hiện huyện của tỉnh-->
        <script type="text/javascript" src="../user/js/ajax-huyen.js"></script>
        <!--code hiện môn học của lớp-->
        <script type="text/javascript" src="../user/js/ajax-monhoc.js"></script>

    </head> 
    <body style="font-family: cambridge;">
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content">
                <div class="inner-content">
                    <!--//outer-wp-->
                    <div class="outter-wp">
                        <!--cap nhat thogn tin ca nahn-->
                        <?php
                        switch ($p) {
                            case '1': require 'blocks/capnhatthongtin.php';
                                break;
                            case '2': require 'blocks/doimatkhau.php';
                                break;
                            case '3': require 'blocks/capnhathinhanh.php';
                                break;
                            case '4' : require 'blocks/capnhatchuyennganh.php';
                                break;
                            case '5' : require 'blocks/dangkymonhoc.php';
                                break;
                            case '7' : require 'blocks/dangkynoiday.php';
                                break;
                            case '8' : require 'blocks/dangkybuoiday.php';
                                break;
                            default : require 'blocks/capnhatthongtin.php';
                        }
                        ?>

                    </div>
                    <!--//outer-wp-->
                    <!--footer section start-->
                    <footer>
                        <p>&copy 2016 | Design by Team TANDUOC </p>
                    </footer>
                    <!--footer section end-->
                </div>
            </div>
            <!--//content-inner-->
            <!--/sidebar-menu-->
            <div class="sidebar-menu">
                <header class="logo">
                    <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="../index.php"> <span id="logo"><h1>Trang chủ</h1></span> 
                        <!--<img id="logo" src="" alt="Logo"/>--> 
                    </a> 
                </header>
                <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
                <!--/down-->
                <div class="down">	
                    <a href="../index.php"><img style="width: 100px; height: 100px;" src="../<?php
                        $img = Hienhinh($row_user["ID_IMG"]);
                        $row_img = mysql_fetch_array($img);
                        echo $row_img["NAME_IMG"];
                        ?>"></a>
                    <a href="../index.php"><span class=" name-caret"><?php echo $row_user["TEN_GS"]; ?></span></a>
                    <p><?php echo $row_user["CHUYENNGANH_GS"]; ?></p>
                    <p><?php
                        $trinhdo = Hientrinhdo_GS($row_user["ID_TRINHDO"]);
                        $row_trinhdo = mysql_fetch_array($trinhdo);
                        echo $row_trinhdo["TEN_TRINHDO"];
                        ?></p>
                    <ul>
                        <li><a class="tooltips" href="../index.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
                        <li><a class="tooltips" href="../index.php"><span>Cài đặt</span><i class="lnr lnr-cog"></i></a></li>
                        <li><a class="tooltips" href="../index.php?dangxuat=1"><span>Đăng xuất</span><i class="lnr lnr-power-switch"></i></a></li>
                    </ul>
                </div>
                <!--//down-->
                <div class="menu">
                    <ul id="menu" >
                        <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>Cập Nhật Hồ Sơ </span> <span class="fa fa-angle-right" style="float: right"></span></a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="capnhatthongtincanhan.php?p=1" onclick=""> Cập Nhật Thông Tin</a></li>
                                <li id="menu-academico-boletim" ><a href="capnhatthongtincanhan.php?p=2" onclick="DoiMK()">Đổi Mật Khẩu</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="capnhatthongtincanhan.php?p=3" onclick="CNHA()">Cập Nhật Ảnh Đại Diện</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="capnhatthongtincanhan.php?p=4" onclick="ChuyenNganh()">Chuyên Ngành</a></li>
                            </ul>
                        </li>
                        <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Đăng Ký</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                            <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="capnhatthongtincanhan.php?p=5" onclick="DayMon()">Đăng Ký Môn Dạy</a></li>

                                <li id="menu-academico-avaliacoes" ><a href="capnhatthongtincanhan.php?p=7"onclick="NoiDay()">Đăng Ký Nơi Dạy</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="capnhatthongtincanhan.php?p=8" onclick="BuoiDay()">Đăng Ký Buổi</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
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
