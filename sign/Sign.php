<?php
session_start();
require '../php/dbc.php';
?>
<!--kiemtradangnhap-->
<?php
if (isset($_POST["btnLogin"])) {
    $u = $_POST["txtU"];
    $pw = $_POST["txtPw"];
    //$txtPw = md5($txtPw);
    $qr = " SELECT * FROM giasu WHERE EMAIL_GS='$u' AND MATKHAU_GS='$pw'";
    $user = mysql_query($qr);
    if (mysql_num_rows($user) == 1) {
        $row = mysql_fetch_array($user);
        $_SESSION["EMAIL_GS"] = $row['EMAIL_GS'];
        $_SESSION["TEN_GS"] = $row['TEN_GS'];
        $_SESSION["MATKHAU_GS"] = $row['MATKHAU_GS'];
        $_SESSION["ID_IMG"] = $row['ID_IMG'];
		$_SESSION["ID_GS"] = $row['ID_GS'];
    }
}
?>
<!--luu mat khau-->
<?php
if((isset($_POST["txtU"]))&&(isset($_POST["txtPw"]))){
	if(isset($_POST["remember"])){
		setcookie("email",$_POST["txtU"],time() + 3600);
		setcookie("password",$_POST["txtPw"],time() + 3600);
		$u = $_POST["txtU"];
		$pw = $_POST["txtPw"];
		//$txtPw = md5($txtPw);
		$qr = " SELECT * FROM giasu WHERE EMAIL_GS='$u' AND MATKHAU_GS='$pw'";
		$user = mysql_query($qr);
		if (mysql_num_rows($user) == 1) {
			$row = mysql_fetch_array($user);
			setcookie("ID_GS",$row['ID_GS'],time() + 3600);
		}
}
}
?>
<!--dangky-->
<?php
if (isset($_GET["btnDangky"])) {
    $e = $_GET["txtE"];
    $pa = $_GET["txtPa"];
    $pa2 = $_GET["txtPa2"];
    $qr = "SELECT * FROM giasu WHERE EMAIL_GS='$e'";
    $user = mysql_query($qr);
    if (mysql_num_rows($user) == 0) {
        if ($pa == $pa2) {
            $qr = "INSERT INTO `giasu`(`ID_GS`, `ID_IMG`, `ID_TRINHDO`, `ID_KHOINGANH`, `TEN_GS`, `GIOITINH_GS`, `NGAYSINH_GS`, `SDT_GS`, `EMAIL_GS`, `MATKHAU_GS`, `GIOITHIEU_GS`, `NOICONGTAC_GS`, `DUYET_GS`, `LUONGKHOIDIEM_GS`, `LUONGCAONHAT_GS`, `CHUYENNGANH_GS`) VALUES (null,1,null,null,null,null,null,null,'$e','$pa2',null,null,null,null,null,null)";
            mysql_query($qr);
            $_SESSION["EMAIL_GS"] = $e;
            $_SESSION["MATKHAU_GS"] = $pa2;
			$qr ="SELECT * FROM giasu WHERE EMAIL_GS = '$e' AND MATKHAU_GS = '$pa2'";
			$query  = mysql_query($qr);
			$row_giasu = mysql_fetch_array($query);
		 	$_SESSION["ID_GS"] = $row_giasu['ID_GS'];
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title style="font-family: Cambridge;">Ghi Danh Gia Sư</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Tab Widget Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--Custom Theme files-->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!--//Custom Theme files -->
        <!--web font-->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
        <!--//web font-->
        <!--js-->
        <script src="js/jquery.min.js"></script>
        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        </script>
        <!--//js-->
    </head>
    <body>
        <!-- main -->
        <div class="main">
            <h1>Tạo Tài Khoảng Gia Sư</h1>
            <div class="main-info">
                <div class="sap_tabs">
                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                        <ul class="resp-tabs-list">
                            <li class="resp-tab-item tab_item-0 tab"><h2><span>Đăng Nhập</span></h2></li>
                            <li class="resp-tab-item tab_item-1 tab"><h2><span>Đăng Ký</span></h2></li>
                        </ul>	
                        <div class="clear"> </div>
                        <div class="resp-tabs-container">
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                <div class="login-top ">
                                    <form method="POST">
                                        <input name="txtU" id="txtU" type="email" class="email" placeholder="Email" required="" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>"/>
                                        <input name="txtPw" id="txtPw" type="password" class="password" placeholder="Password" required="" value="<?php  if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>"/>	
                                        <input name="remember" type="checkbox" id="brand" value="">
                                        <label for="brand"><span></span>Nhớ đăng nhập</label>
                                        <div class="login-bottom">
                                            <ul>
                                                <li>
                                                    <a href="#">Quên mật khẩu?</a>
                                                </li>
                                                <li>
                                                    <input name="btnLogin" id="btnLogin" type="submit" value="Đăng Nhập" />

                                                    <?php
                                                    if ((isset($_SESSION["EMAIL_GS"]))||(isset($_SESSION["ID_GS"]))) {
                                                        sleep(1);
                                                        header('location: ../index.php');
                                                    }
                                                    ?>
                                                </li>
                                            </ul>

                                            <div class="clear"></div>

                                        </div>
                                     </form>
                                </div>
                            </div>
                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                <div class="login-top sign-top">
                                    <form method="GET">
                                        <input name="txtE" id="txtE" type="email" class="email" placeholder="Email" required="" />
                                        <p style="color: red;">
                                            <?php
                                            if (isset($_GET["btnDangky"])) {
                                                $e = $_GET["txtE"];
                                                $qr = "SELECT * FROM giasu WHERE EMAIL_GS='$e'";
                                                $user = mysql_query($qr);
                                                if (mysql_num_rows($user) == 1) {
                                                    echo 'Email này đã được sử dụng';
                                                }
                                            }
                                            ?>
                                        </p>
                                        <input name="txtPa" id="txtPa" type="password" class="password" placeholder="Password" required=""/>
                                        <input name="txtPa2" id="txtPa2" type="password" class="password" placeholder="Nhập lại Password" required=""/>
                                        <p style="color: red;">
                                            <?php
                                            if (isset($_GET["btnDangky"])) {
												if(mysql_num_rows($user) == 0){
                                                if ($_GET["txtPa"] != $_GET["txtPa2"])
                                                    echo 'Mật khẩu nhập lại không khớp';
                                            }}
                                            ?>
                                        </p>
                                        <div class="login-bottom" >
                                            <ul>
                                                <li>
                                                    <input id="btnDangky" name="btnDangky" type="submit" value="Đăng Ký"/>
                                                </li>
                                            </ul>
                                            <div class="clear"></div>
                                        </div>	
                                    </form>
                                </div>
                            </div>
                        </div>	
                    </div>
                    <div class="clear"> </div>
                </div>
            </div>	
            <center> <a href="../index.php"> Trang Chủ  </a></center>  
            <!--copyright-->
            <div class="copyright">
                <p> © 2016 Gia Sư Giỏi | Coppyright W3layouts </p>
            </div>
            <!--//copyright-->
        </div>	
    </body>
</html>