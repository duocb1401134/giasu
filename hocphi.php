<?php
session_start();
require 'php/dbc.php';
require 'php/menu.php';
require 'php/code_index.php';
require 'php/code_danhsachgiasu.php';
$p = 5;
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Học Phí - Quang Trí</title>
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
        <!-- hiện lớp--> 
        <script type="text/javascript" src="js/ajax-monhoc.js"></script>

    </head>

    <body>
        <!-- header -->
        <?php
        if (!isset($_SESSION["ID_GS"])) {
            require 'blocks/menu-login-before.php';
        } else {
            require 'blocks/menu-login-after.php';
        }
        ?>
        <!-- //header -->
        <div class="events">
     
                <h3 class="title"><span>Bảng học phí tại Trung tâm Gia sư giỏi</span></h3>
                <p class="autem">Gia sư giỏi là dịch vụ Gia sư chuyên nghiệp. Chúng tôi chuyên cung cấp giới thiệu gia sư dạy kèm tại nhà
                    học viên, tại nhà giáo viên và tại trung tâm. Gia sư <a href="index.php"> Quang Trí</a>  trân trọng thông báo bảng học phí dạy kèm tại
                    cụ thể như sau:</p>
                <br>                 
                <center>  <div style="font-size: 30px; color: red;" >  BẢNG HỌC PHÍ DẠY KÈM TẠI NHÀ TRÊN 1 THÁNG </div> </center>                    
                <br>               
                <table class="table-bordered table table-responsive" style="font-size: 20px;">
                    <thead>
                        <tr>
                            <th> </th>
                            <th> 8 buổi/tháng</th>
                            <th>12 buổi/tháng</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr >

                            <td > Sinh Viên <br> Áp dụng từ lớp 1 đến lớp 8 </td>

                            <td align = "right"> 400,000</td>
                            <td align = "right">600,000</td>
                        </tr>
                        <tr>
                            <td>Sinh Viên <br> Áp dụng từ lớp 9 trở lên</td>
                            <td align = "right">500,000</td>
                            <td align = "right">700,000</td>
                        </tr>
                        <tr>
                            <td>Giáo viên từ 1 đến 2 năm kinh nghiệm</td>
                            <td align = "right">600,00</td>
                            <td align = "right">900,000</td>

                        </tr>
                        <tr>
                            <td>Giáo viên từ 3 đến 4 năm kinh nghiệm hoặc đang học cao học</td>
                            <td align = "right">800,000</td>
                            <td align = "right">1,200,000</td>
                        </tr>
                        <tr>
                            <td> Giáo viên từ 5 đến 6 năm kinh nghiệm hoặc có học vị Thạc sĩ </td>
                            <td align = "right">1,000,000</td>
                            <td align = "right">1,500,000</td>
                        </tr>
                        <tr>
                            <td> Giáo viên từ 7 năm kinh nghiệm trở lên</td>
                            <td align = "right">1,200,000</td>
                            <td align = "right">1,800,000</td>
                        </tr>
                        <tr>
                            <td> Giảng viên, giáo viên trường điểm,trường chuyên.</td>
                            <td align = "right">2,000,000</td>
                            <td align = "right">3,000,000</td>
                        </tr>
                        <tr align = "left">

                            <td colspan="3" style="padding-left:  15px;">

                                <p> - Mỗi buổi dạy 2 tiết (90 phút) </p>

                                <p> - Bảng học phí áp dụng cho 1 học viên </p>

                                <p> - Thêm 1 học viên vào lớp chỉ thêm 100,000 đ </p>

                                <p> - Giảng viên, giáo viên trường điểm, trường chuyên: học phí áp dụng cho

                                    nhóm từ 5 em trở xuống.</p>

                                <p> - Học phí có thể tuỳ chỉnh giảm nếu học viên gần nhà giáo viên. </p>

                            </td>    
                        </tr>

                    </tbody>
                </table>            
        </div>
        <br/>
        <div class="events">                 
            <center>  <div style="font-size: 30px; color: red;" >  Học Tại Trung Tâm </div>                    
                <p style="font-size: 20px"> Áp dụng cho các nhóm học tại trung tâm </p>
            </center> 
            <br>                    
            <table class="table-bordered table table-responsive">

                <tbody align = "center">
                    <tr >

                        <td align = "left"> Chứng chỉ A anh văn </td>
                        <td> Dưới 5 bạn</td>
                        <td>1,000,000/học viên</td>
                    </tr>
                    <tr>
                        <td align = "left"> Chứng chỉ A anh văn </td>
                        <td> Trên 5 bạn</td>
                        <td>800,000/học viên</td>
                    </tr>
                    <tr>
                        <td align = "left"> Chứng chỉ B anh văn </td>
                        <td> Dưới 5 bạn</td>
                        <td>1,200,000/học viên</td>

                    </tr>
                    <tr>
                        <td align = "left"> Chứng chỉ B anh văn </td>
                        <td> Trên 5 bạn</td>
                        <td>1,000,000/học viên</td>
                    </tr>
                    <tr>
                        <td align = "left"> Chứng chỉ C anh văn </td>
                        <td> Dưới 5 bạn</td>
                        <td>1,500,000/học viên</td>
                    </tr>
                    <tr>
                        <td align = "left"> Chứng chỉ C anh văn </td>
                        <td> Trên 5 bạn</td>
                        <td>1,200,000/học viên</td>
                    </tr>
                    <tr>
                        <td align = "left"> Chứng chỉ Toeic </td>
                        <td> Dưới 5 bạn</td>
                        <td>1,500,000/học viên</td>
                    </tr>
                    <tr>
                        <td align = "left"> Chứng chỉ Toeic </td>
                        <td> Trên 5 bạn</td>
                        <td>1,200,000/học viên</td>
                    </tr>
                    <tr>
                        <td align = "left"> Hướng dẫn cách viết luận văn </td>

                        <td colspan="2">500,000 - 1,500,000</td>
                    </tr>
                    <tr>
                        <td align = "left"> Khóa học khai báo thuế (<samp style="color: red">*</samp>) </td>
                        <td > 10 bạn </td>
                        <td > 1,500,000</td>
                    </tr>
                    <tr>
                        <td align = "left"> Khóa học giám sát công trình (<samp style="color: red">*</samp>)</td>
                        <td > 10 bạn </td>
                        <td > 1,500,000</td>
                    </tr>
                    <tr>
                        <td align = "left"> Khóa học kỹ năng mềm  (<samp style="color: red">*</samp>)</td>
                        <td > 10 bạn </td>
                        <td > 1,500,000</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div style="color: blue; font-size: 20px"> 
                Ghi chú: Bảng học phí mang tính tham khảo trên Toàn Quốc. 
                <br>Tùy thuộc vào từng địa phương cụ thể quý phụ huynh vui lòng trao đổi học phí trực tiếp với giáo viên.
            </div>
            <hr>
            <div style="color:red; font-size: 20px"> 
                (<samp style="color: red">*</samp>) Các học phần có cấp bằng
            </div>
        </div>

        <!-- //single -->
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
