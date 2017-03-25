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
<!--                        <ul class="resp-tabs-list">
                            <li class="resp-tab-item tab_item-0 tab"><h2><span>Đăng Nhập</span></h2></li>
                            <li class="resp-tab-item tab_item-1 tab"><h2><span>Đăng Ký</span></h2></li>
                        </ul>	-->
                        <div class="clear"> </div>
                        <div class="resp-tabs-container" >
                            <div class="resp-tab-content" style="display: block" aria-labelledby="tab_item-0">
                                <div class="login-top ">
                                    <form method="POST" >
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