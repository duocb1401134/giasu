<?php
require 'admin/dbc.php';
if (isset($_GET["p"])) {
$ID = $_GET["p"];}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Sữa Tin - Amin Quang Trí</title>
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
        <link href="css/bootstrap-markdown.min.css" rel='stylesheet' type='text/css' />
        <!-- Graph CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap-markdown.js"></script>
        <script language="javascript" type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
        <!----->

        <!--clock init-->
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
                    <div class="outter-wp">
                        <!--sub-heard-part-->
                        <div class="sub-heard-part">
                            <ol class="breadcrumb m-b-0">
                                <li><a href="index.php">Home</a></li>
                                <li class="active"> Sửa tin tức </li>
                            </ol>
                        </div>
                        <!--//sub-heard-part-->
                        <div class="graph-visual">
                            <h2 class="inner-tittle"> Sửa tin tức </h2>
                            
                                <?php             
                                
                                    $select = "select * from tintuc where ID_TT = $ID";
                                    $qr_tim = mysql_query($select);
                                    $row = mysql_fetch_array($qr_tim);                                                              
                                ?>
                                
                          
                            <div class="clearfix"> <br> </div>
                            <div class="maark-edit graph">

                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input class="form-control" name="tieude" type="text" placeholder="Tiêu đề" value="<?php echo $row['TIEUDE_TT'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="gioithieu" type="text" placeholder="Giới thiêu sơ nét"> <?php echo $row['GIOITHIEU'] ?></textarea>
                                    </div>
                                    <div class="md-editor" id="1454925081632">
                                        <textarea name="noidung" id="text" name="text" class="ckeditor" style="resize: none;">                                           
                                        <?php echo $row['NOIDUNG_TT'] ?>
                                        </textarea>

                                    </div>
                                    <hr>
                                    <button name="dangtin" type="submit" class="btn">Đăng</button>
                                </form>
                                <?php
                                if (isset($_POST['dangtin'])) {
                                    $tieude = $_POST['tieude'];
                                    $gioithieu = $_POST['gioithieu'];
                                    $noidung = mysql_real_escape_string($_POST['noidung']);

                                    $insert = "UPDATE `tintuc` SET `TieuDe_TT`='$tieude',`NoiDung_TT`='$noidung',`GioiThieu`='$gioithieu' WHERE ID_TT = $ID";
                                          
                                    mysql_query($insert);                                  
                                    echo '<meta http-equiv="refresh" content="1">'   ;                           
                                }
                                ?>
                            </div>

                        </div>

                    </div>
                    <!--//outer-wp-->
                </div>
                <!--footer section start-->
                <?php
                require 'blocks/fotter.php';
                ?>
                <!--footer section end-->
            </div>
            <?php
            require 'blocks/menu_right.php';
            ?>
            <!--//content-inner-->
            <!--/sidebar-menu-->

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