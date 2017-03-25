<?php 
require '../php/dbc.php';
require '../php/code_index.php';
require '../php/code_danhsachgiasu.php';
require '../php/giasu.php';
if (isset($_GET["p"])) {
    $ID_GS = $_GET["p"];
}
?> 
<!DOCTYPE HTML>
<html>
    <head>
        <title>Quang Trí|Chi tiết gia sư</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="images/icon.jpg" rel="shortcut icon" type="image/x-icon"/>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                        <!--sub-heard-part-->
                        <div class="sub-heard-part">
                            <ol class="breadcrumb m-b-0">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Chi Tiết Gia Sư</li>
                            </ol>
                        </div>
                        <!--//sub-heard-part-->
                        <!--/profile-->
<?php 
                       
$select="select * from giasu INNER JOIN image ON giasu.ID_IMG = image.ID_IMG where ID_GS=$ID_GS";
$qr= mysql_query($select);
$rows = mysql_fetch_array($qr);
?>
                        <div class="profile-widget">
                            <img src="<?php echo $rows['NAME_IMG']; ?>" alt=" " />
                           <h2>ID Gia Sư: <?php echo $rows['ID_GS']; ?></h2>
                           
                           
                        </div>
                        <!--/profile-inner-->
                        <div class="profile-section-inner">
                            <div class="col-md-6 profile-info">
                                <h3 class="inner-tittle">Thông tin cơ bản</h3>
                                <div class="main-grid3">
                                    <div class="p-20">
                                        <div class="about-info-p">
                                            <strong>Họ và Tên</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $rows['TEN_GS'];?></p>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Số Điện Thoại</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $rows['SDT_GS'];?></p>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Mức Lương</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $rows['LUONGKHOIDIEM_GS'];?> - <?php echo $rows['LUONGCAONHAT_GS']; ?></p>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Email</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $rows['EMAIL_GS']; ?></p>
                                        </div>
                                       
                                    </div>
                                </div>
                                <h3 class="inner-tittle">Giới thiệu cơ bản </h3>
                                <div class="main-grid3 p-skill">
                                    
                                    <p class="para"><?php echo $rows['GIOITHIEU_GS']; ?></p>
                                    
                                </div>
                                <br/>
                                <div class="clearfix"> </div>
                                <div class="main-grid3">
                                    <form method="POST">
                                       <input type="submit" name="DUYET"  value="Duyệt">
                                      
                                     </form>
                                    <?php 
                                    if(isset($_POST['DUYET'])){
                                        $update = "UPDATE `giasu` SET `DUYET_GS`=1,`DAXEM_GS`=1 WHERE ID_GS=$ID_GS";
                                        mysql_query($update);
                                        
                                    }
                                    
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="col-md-6 profile-info two">
                                <h3 class="inner-tittle">Danh sách đăng ký môn dạy </h3>
                                <div class="main-grid3 p-skill">

                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-panel">
                                                
                                                <div class="timeline-heading">
                                                    <?php
                                                    $i = 0;
                                                    $qr = "SELECT * FROM day WHERE ID_GS = " .$ID_GS;
                                                    $hienday = mysql_query($qr);
                                                    while ($row_hienday = mysql_fetch_array($hienday)) {
                                                        $i++;
                                                        $hienmon = Hienmonday_GS($row_hienday["ID_MONHOC"]);
                                                        $row_hienmon = mysql_fetch_array($hienmon);
                                                        $hienlop = Hienlopday_GS($row_hienmon["ID_LOP"]);
                                                        $row_hienlop = mysql_fetch_array($hienlop);
                                                        echo '<h4 class="timeline-title">'. $row_hienmon["TEN_MONHOC"] . "- " . $row_hienlop["TEN_LOP"] . "</h4>";
                                                        
                                                    }
                                                    ?>	
                                                                                               
                                                </div>
                                                
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>		
                                </div>
                            </div>
                            <div class="col-md-6 profile-info two">
                                <h3 class="inner-tittle">Danh sách đăng ký nơi dạy </h3>
                                <div class="main-grid3 p-skill">

                                    <ul class="timeline">
                                        <li>
                                            
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    
                                                    <?php
						$i=0;
						$qr="SELECT * FROM dangkynoiday WHERE ID_GS = ".$ID_GS;
						$hiendknd = mysql_query($qr);
						while($row_hiendknd = mysql_fetch_array($hiendknd))
						{
						$i++;	
						$hienhuyen = Hienhuyen_GS($row_hiendknd["ID_HUYEN"]);
						$row_hienhuyen = mysql_fetch_array($hienhuyen);
						$hientinh = Hientinh_GS($row_hiendknd["ID_TINH"]);	
						$row_tinh = mysql_fetch_array($hientinh);						
					
                                                if(isset($row_hienhuyen["TEN_HUYEN"])) 
								echo 
									 '<h4 class="timeline-title">'.$row_hienhuyen["TEN_HUYEN"].' - '.$row_tinh["TEN_TINH"].'</h4>';
									 
							 else 
								echo '<h4 class="timeline-title">'.$row_tinh["TEN_TINH"].'</h4>';
						
						}
					?>
                                                    
                                                    
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>		
                                </div>
                            </div>
                            <!--/map-->
                            
                            <div class="clearfix"></div>
                        </div>

                        <!--//profile-inner-->
                        <!--//profile-->
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