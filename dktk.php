<?php
session_start();
require 'php/code_dangky_dangnhap.php';
?>

<html>
    <head>
        <title> Đăng ký tài khoản - Quang Trí</title>
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
        <!--kiểm tra đăng ký-->
    </head>
    <body>
        <br/>
        <div class="typo-grids events" style="margin: 0px auto; padding: 30px 30px 20px 30px; width: 550px; background-color: white;">
            <center> <h1 style=" color: #00B6FF">ĐĂNG KÝ TÀI KHOẢN GIA SƯ</h1> </center>                                    
            <hr>
            <div >
                <form method="POST" class="form-inline">                            
                    <div class="keywords emmail">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        <input type="email" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="keywords">
                        <span class=" glyphicon glyphicon-lock" aria-hidden="true"></span>
                        <input type="password" name ="pass" placeholder="Mật khẩu">
                    </div>
                    <div class="keywords">
                        <span class=" glyphicon glyphicon-lock" aria-hidden="true"></span>
                        <input type="password" name ="pass_again" placeholder="Nhập lại Mật khẩu">
                    </div>
                    <div class="keywords">
                        <p class="thongbao" style="color:red; font-weight:bold; font-size:18px; text-align:center;">
                            <!--dangky-->
                            <?php
                            if (isset($_POST["btnDangky"])) {
                                $email = $_POST["email"];

                                $pass = $_POST["pass"];
                                $pass_again = $_POST["pass_again"];
                                dangkytaikhoan($email, $pass, $pass_again);
                                if ((isset($_SESSION["ID_GS"]))) {
                                    sleep(1);
                                    header('location:index.php');
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="clearfix"> </div>


                    <div class="reservation-grids">
                        <div class="reservation-grids">
                        </div>
                        <div class="keywords">
                            <input id="btnDangky" name="btnDangky" type="submit" value="Đăng Ký">
                            <hr>
                            <div class="clearfix"> </div>
                            <center> <a id="a_link" href="index.php"> Trang Chủ </a> </center>
                        </div>                                
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
        <br/>
        <?php
        require 'blocks/fotter_index.php';
        ?>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $().UItoTop({easingType: 'easeOutQuart'});
            });
        </script>
    </body>
</html>
