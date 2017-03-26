
<div class="header">	
    <div class="header-bottom">
        <div class="header-top">
            <div class="container"> 
                <div class="header-top-left">
                    <ul>
                        <li> <h4><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> 094 88 11 024 </h4></li>
                        <li><h4>0909 999 999 </h4></li>                        
                        <li><h4><span class="glyphicon glyphicon-envelope" aria-hidden="true" style="font-size: 22px;"> tanduoc13@gmail.com</span> </h4></li>
                    </ul>
                </div>		
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
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
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <nav>
                        <ul class="nav navbar-nav">
                            <li <?php menu_trangchu($p); ?>><a href="index.php" class="hvr-bounce-to-bottom"><strong>Trang Chủ </strong></a></li>
                            <li <?php menu_tintuc($p); ?>><a href="tintuc.php" class="hvr-bounce-to-bottom"><strong> Tin Tức </strong></a></li>
                            <li <?php menu_giasu($p); ?>><a href="danhsachgiasu.php" class="hvr-bounce-to-bottom"><strong>Gia Sư</strong></a></li>

                            <li <?php menu_chieusinh($p); ?>><a href="chieusinh.php" class="hvr-bounce-to-bottom"><strong>Chiêu Sinh </strong></a></li>
                            <li <?php menu_hocphi($p); ?>><a href="hocphi.php" class="hvr-bounce-to-bottom"><strong>Học Phí</strong></a></li>
                            <li><a href="#footer" class="hvr-bounce-to-bottom"><strong>Liên Hệ</strong></a></li>
                            <li role="presentation" class="dropdown">
                                <a href="#" style="padding:10px 10px 10px 10px " 
                                   id="myTabDrop1" class="dropdown-toggle" 
                                   data-toggle="dropdown" aria-controls="myTabDrop1-contents">
                                    <img style="width: 50px; height: 50px; border-radius: 50%;" 
                                         src="<?php
                                         $avt = Hienhinh($_SESSION["ID_IMG"]);
                                         $row_avt = mysql_fetch_array($avt);
                                         echo $row_avt["NAME_IMG"];
                                         ?>"/></a>

                                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                                    <?php
                                    if ($row_user["ADMIN"] == 1) {
                                        echo
                                        "<li><a href='user/index.php' class='hvr-bounce-to-bottom' tabindex='-1' role='tab' id='dropdown1-tab' >ADMIN</a></li>";
                                    }
                                    ?>
                                    <li><a href="user/capnhatthongtincanhan.php?p=3" class="hvr-bounce-to-bottom" tabindex="-1" role="tab" id="dropdown1-tab" >Thay đổi avatar</a></li>
                                    <li><a href="user/capnhatthongtincanhan.php" class="hvr-bounce-to-bottom" tabindex="-1" role="tab" id="dropdown1-tab" >Cập nhật thông tin</a></li>
                                    <li><a href="user/capnhatthongtincanhan.php?p=5"  class="hvr-bounce-to-bottom" tabindex="-1" role="tab" id="dropdown1-tab" >Đăng ký lớp- môn dạy</a></li>
                                    <li><a href="user/capnhatthongtincanhan.php?p=8"  class="hvr-bounce-to-bottom" tabindex="-1" role="tab" id="dropdown1-tab" >Đăng ký buổi dạy</a></li>
                                    <li><a href="user/capnhatthongtincanhan.php?p=7"  class="hvr-bounce-to-bottom" tabindex="-1" role="tab" id="dropdown1-tab" >Đăng ký nơi dạy</a></li>
                                    <li><a href="index.php?dangxuat=1"  class="hvr-bounce-to-bottom" tabindex="-1" role="tab" id="dropdown1-tab" >Đăng xuất</a></li></li>
                        </ul>	
                        </li>
                        </ul>
                    </nav>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
</div>

