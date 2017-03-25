<div class="header">	
    <div class="header-bottom">
        <div class="header-top">
            <div class="container"> 
                <div class="header-top-left">
                    <ul>
                        <li> <h4><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> 0919 928 565 </h4></li>
                        <li><h4>0907 938 565 </h4></li>                        
                        <li><h4><span class="glyphicon glyphicon-envelope" aria-hidden="true"> Trangnguyenmc2010@gmail.com</span> </h4></li>
                    </ul>
                </div>		
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <div class="container">

        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header">
                <a href="index.php">
                    <img src="images/logo.gif" class="img-responsive logome"/>
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>




            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li <?php menu_trangchu($p); ?>><a href="index.php" class="hvr-bounce-to-bottom"><strong>Trang Chủ </strong></a></li>
                        <li <?php menu_tintuc($p); ?>><a href="tintuc.php" class="hvr-bounce-to-bottom"><strong> Tin Tức </strong></a></li>
                        <li <?php menu_giasu($p); ?>><a href="danhsachgiasu.php" class="hvr-bounce-to-bottom"><strong>Gia Sư</strong></a></li>

                        <li <?php menu_chieusinh($p); ?>><a href="ChieuSinh.php" class="hvr-bounce-to-bottom"><strong>Chiêu Sinh </strong></a></li>
                        <li <?php menu_hocphi($p); ?>><a href="hocphi.php" class="hvr-bounce-to-bottom"><strong>Học Phí</strong></a></li>
                        <li><a href="#footer" class="hvr-bounce-to-bottom"><strong>Liên Hệ</strong></a></li>
                        <li <?php menu_dangnhap($p); ?>><a href="dn.php" class="hvr-bounce-to-bottom">Đăng Nhập</a></li>
                    </ul>
                </nav>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
</div>
