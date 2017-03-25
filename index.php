<?php
session_start();
require 'php/dbc.php';
require 'php/giasu.php';
require 'php/menu.php';
require 'php/code_index.php';
require 'php/code_danhsachgiasu.php';
require 'php/code_chitietchieusinh.php';
require 'php/Top_4.php';
$p = 1;
?>  
<!--đăng ký theo gia sư-->
<?php
if (isset($_GET['q'])) {
    $q = $_GET['q'];
} else {
    $q = null;
}
// Đăng ký theo chiêu sinh
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = null;
}
?>
<!--kiểm tra biến cooki đã có chưa-->
<?php
if (!isset($_SESSION["ID_GS"])) {
    if (isset($_COOKIE['ID_GS'])) {
        $_SESSION["ID_GS"] = $_COOKIE['ID_GS'];
        $qr = " SELECT * FROM giasu WHERE ID_GS=" . $_SESSION['ID_GS'];
        $user = mysql_query($qr);
        $row = mysql_fetch_array($user);
        $_SESSION["EMAIL_GS"] = $row['EMAIL_GS'];
        $_SESSION["TEN_GS"] = $row['TEN_GS'];
        $_SESSION["MATKHAU_GS"] = $row['MATKHAU_GS'];
        $_SESSION["ID_IMG"] = $row['ID_IMG'];
    }
}
?>
<?php
// nut dang xuat
if (isset($_GET["dangxuat"])) {
    unset($_SESSION["EMAIL_GS"]);
    unset($_SESSION["TEN_GS"]);
    unset($_SESSION["MATKHAU_GS"]);
    unset($_SESSION["IMG"]);
    unset($_SESSION["ID_GS"]);
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Quang Trí</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Plottage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <!-- //for-mobile-apps -->
        
        <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>  
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/acornmediaplayer.base.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/clndr.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <!-- //js -->
        <link href='//fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/responsiveslides.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- start-smoth-scrolling -->
        <!--code hiện huyện của tỉnh-->
        <script type="text/javascript" src="js/ajax-huyen.js"></script>
        <!--code hiện môn học của lớp-->
        <script type="text/javascript" src="js/ajax-monhoc.js"></script>
        <!--code đăng ký luận văn-->
        <script type="text/javascript" src="js/ajax-hdluanvan.js"></script>	
        <script>
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
            }
            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                ;
                return i;
            }
        </script>
    </head>
    <body onload="startTime()">
        <!-- header -->
        <?php
        if (!isset($_SESSION["ID_GS"])) {
            require 'blocks/menu-login-before.php';
        } else {
            require 'blocks/menu-login-after.php';
        }
        ?>
        <!-- //header -->
        <!-- banner -->
        <div class="content">
            <!--Start a group-->
            <div class="agileits slider agileits">                       
                <ul class="rslides agileits callbacks callbacks1" id="slider">                            
                    <li class="set-ss">
                        <div style="position: relative">
                            <img src="images/sld1.png">
                            <div class="slshlink"></div>
                        </div>   
                    </li>
                    <li class="set-ss">
                        <div style="position: relative">
                            <img src="images/sld2.png">
                            <div class="slshlink"> </div>
                        </div> 
                    </li>
                    <li class="set-ss">
                        <div style="position: relative">
                            <img src="images/sld3.png">
                            <div class="slshlink"> </div>
                        </div> 
                    </li>
                    <li class="set-ss">
                        <div style="position: relative">
                            <img src="images/slide-4.jpg">
                            <div class="slshlink"></div>
                        </div> 
                    </li>
                    <li class="set-ss">
                        <div style="position: relative">
                            <img src="images/slide-5.jpg">
                            <div class="slshlink"></div>
                        </div> 
                    </li>
                </ul>
            </div> 
            <!-- End a group. Set all links and link titles in under Javascript source.-->
            <link href="css/link.css" rel="stylesheet" type="text/css"/>
            <script type="text/javascript" src="js/Slsh_link.js"></script>

        </div>
        <script>
        $(function () {
            $("#slider, #slider2").responsiveSlides({
                auto: true,
                nav: true,
                speed: 1500,
                namespace: "callbacks",
                pager: true
            });
        });
        </script>
        <!-- End banner -->
        <!-- about -->
        <div class="clearfix"> </div>
        <div class="events" id="loingo" style="padding-left: 100px; padding-right: 100px;" >         
            <h3>Lời ngõ</h3>               
            <p>
                Lời đầu tiên cho trung tâm gia sư giỏi 123 gởi lời cảm ơn chân thành và sâu sắc
                đến các thầy cô luôn đồng hành cùng trung tâm, các phụ huynh cùng các em học
                sinh thân mến.</p>
            <p> 
                Được sự động viên chân thành và đóng góp ý kiến xây dựng của tất cả bạn bè,
                đồng nghiệp mà trung tâm gia sư giỏi 123 đã hoàn thành xuất sắc nhiệm vụ giáo
                dục con người của mình. Để đáp lại tình cảm tốt đẹp đó trung tâm cố gắng phát
                huy tất cả nguồn lực để phục vụ công tác giáo dục một cách tốt nhất.</p>
            <p>
                Quý phụ huynh cùng các em học sinh đã quen với trung tâm gia sư giỏi 123 với
                các dịch vụ như:</p>
            <ul>                         
                <li > 
                    Dịch vụ dạy thêm tại nhà: Trung tâm sẽ cho giáo viên có kinh nghiệm đến
                    tận nhà dạy các em học sinh, sinh viên ở tất cả các môn học.</li>
                <li> Dịch vụ dạy tại trung tâm: trung tâm thường xuyên mở các lớp dạy tất cả
                    các môn học từ 1-12. Bên cạnh đó, trung tâm còn mở các lớp luyện thi anh văn
                    chứng chỉ A, B, C, Toeic.</li>
                <li> Dịch vụ hướng dẫn cách viết luận văn, tiểu luận tốt nghiệp</li>
            </ul>
            <p > Thời gian tới trung tâm có mở thêm một số lớp:
            </p>
            <ul>
                <li>  Đào tạo kỹ năng mềm cho sinh viên mới tốt nghiệp để tìm việc làm hiệu quả. </li>
                <li>  Đào tạo một số kỹ năng học các môn xã hội như lớp học lịch sử bằng
                    phương pháp mới giúp các em học sinh dễ nhớ ngày tháng năm diễn ra các sự kiện
                    lịch sử. Lớp học môn văn không buồn ngủ.</li>
            </ul>      
        </div>
        <div class="events">
            <h3><span>Danh Sách Gia Sư</span></h3>
            <p class="autem">4 Gia Sư Tiêu biểu nhất</p>
            <div class="about-grids">
                <p class="delectus">Chúng tôi là một đội ngũ gia sư chuyên nghiệp đã qua đào tạo và kiểm tra nghiêm khắc trước khi nhận dạy</p>
                <?php
                $bon_GS = Top4_GS();
                while ($row_bon_GS = mysql_fetch_array($bon_GS)) {
                    ?>
                    <div class="col-md-3 about-grid">
                        <a href="CT_GS.php?q=<?php echo $row_bon_GS['ID_GS']; ?>">
                            <figure>
                                <img src="<?php
                                $avt = Hienhinh($row_bon_GS['ID_IMG']);
                                $row_avt = mysql_fetch_array($avt);
                                echo $row_avt["NAME_IMG"];
                                ?>" alt="" class="img-responsive"/>
                                <figcaption>
                                    <h4><?php echo $row_bon_GS['TEN_GS']; ?></h4>
                                    <p> <?php echo $row_bon_GS['GIOITHIEU_GS']; ?></p> 
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    <?php
                }
                ?>
                <div class="clearfix"> </div>
            </div>
            <p align ="right" style="padding-top: 20px;" > <a href="danhsachgiasu.php" style="text-decoration: none;"> Xem nhiều hơn >> </a> </p>
            <div class="clearfix"> </div>
        </div>        
        <!-- //about -->
        <!-- about-bottom -->
        <!-- //about-bottom -->
        <!-- events -->
        <div class="events">
            <div class="container">
                <h3><span>Chiêu Sinh</span></h3>
                <p class="autem">Các khoá học mới dang mở ở trung tâm</p>
                <div class="events-grids">
                    <?php
                    $Chieusinh_top3 = Chieusinh_top3();
                    while ($row_Chieusinh_top3 = mysql_fetch_array($Chieusinh_top3)) {
                        ?>
                        <div class="col-md-4 events-grid">
                            <div class="events-grid1 hvr-sweep-to-top">
                                <a href="chitietchieusinh.php?q=<?php echo $row_Chieusinh_top3['ID_CHIEUSINH'] ?>">
                                    <img width="300px" height="auto" src="<?php
                                    $Hienhinh = Hienhinh($row_Chieusinh_top3['ID_IMG']);
                                    $row_Hienhinh = mysql_fetch_array($Hienhinh);
                                    echo $row_Hienhinh["NAME_IMG"];
                                    ?>" alt= "" class="img-responsive"/></a>
                                <h4><a href="chitietchieusinh.php?q="><?php
                                        echo $row_Chieusinh_top3['TEN_CHIEUSINH'];
                                        ?></a></h4>
                                <ul>
                                    <li><span class="glyphicon glyphicon-calendar" aria-hidden="true"><?php echo $row_Chieusinh_top3['NGAYMO_CHIEUSINH'] ?></span></li>
                                </ul>
                                <p><?php echo $row_Chieusinh_top3['MOTA_CHIEUSINH']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="clearfix"> </div>
                </div>
                <p align ="right" style="padding-top: 20px;" > <a href="chieusinh.php" style="text-decoration: none;"> Xem nhiều hơn >> </a> </p>
            </div>
        </div>
        <!-- //events -->
        <!-- footer -->
        <?php
        require 'blocks/fotter_index.php';
        ?>
    </div>
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
    <!--code tỉnh hiện huyện-->

</body>
</html>