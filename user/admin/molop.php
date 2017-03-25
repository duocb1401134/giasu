<script src="user/admin/ajax-monhoc.js"></script>
<div class="outter-wp">
    <!--/sub-heard-part-->
    <div class="sub-heard-part">
        <ol class="breadcrumb m-b-0">
            <li>Mở lớp</li>
            <li><a href="index.php?p=5">Mở lớp</a></li>
        </ol>
    </div>	
    <!--/sub-heard-part-->	
    <!--/forms-->
    <div class="forms-main">
        <h2 class="inner-tittle"><center> Chiêu sinh</center> </h2> 
       
        <div class="graph-form">
            <div class="form-body">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $img_name = $_FILES['img']['name'];
                    
                    $array_img_name = explode(".", $img_name);
                    $img_type = $array_img_name[count($array_img_name) - 1];
                    $valid_type = "gif,png,bmp,jpg,jpeg,GIF,PNG,JGP,JPEG";
                    $array_valid_type = explode(",", $valid_type);
                    $valid_img = "";
                    for ($r = 0; $r < count($array_valid_type); $r++) {
                        if ($img_type == $array_valid_type[$r]) {
                            $valid_img = "true";
                            break;
                        }
                    }
                    if (isset($_POST['submit'])) {
                       
                           
                        if ($valid_img == "true") {
                            $thumd_img = "thumb_" . $img_name;
                            $dir1 = "../";
                            $dir2 = "images/molop";
                            if (is_dir($dir1 . $dir2)) {                                
                            } else {
                                mkdir($dir1 . $dir2);
                                }                            
                            $upload_path = $dir1 . $dir2 . "/" . $img_name;
                            move_uploaded_file($_FILES['img']['tmp_name'], $upload_path);
                            $tenchieusinh = $_POST['tenlop'];
                            $idmonhoc = $_POST['mon'];
                            $gioithieu = $_POST['gioithieu'];
                            $ngaymo = $_POST['ngaymo'];
                            $idgs = $_POST['id_giasu'];
                            $nd = $_POST['ndct'];
                            $kt = "SELECT * from chieusinh where ID_GS=$idgs and ID_MONHOC='$idmonhoc' and NGAYMO_CHIEUSINH = '$ngaymo'";
                            $qr = mysql_query($kt);
                            $kt_dl = mysql_fetch_array($qr);
                            if ($kt_dl != 0) {
                                echo '<div style="color: red"><center> Lớp đã mỡ rồi </center> </div>';
                            } else {
                                $sql = "INSERT INTO `image`(`ID_IMG`, `NAME_IMG`, `MOTA`) VALUES (null,'$dir2/$img_name',null)";
                                mysql_query($sql);                               
                                $last_id = mysql_insert_id($conn);
                                $insert = "INSERT INTO `chieusinh`(`ID_CHIEUSINH`, `ID_IMG`, `ID_GS`, `ID_MONHOC`, "
                                        . "`TEN_CHIEUSINH`, `MOTA_CHIEUSINH`, `NGAYMO_CHIEUSINH`,`ND_CS`) "
                                        . "VALUES (NULL,$last_id,$idgs,'$idmonhoc','$tenchieusinh','$gioithieu','$ngaymo','$nd')";
                                mysql_query($insert);                            
                            }
                        }
                    }
                }
                ?>
                <form method ="POST" enctype="multipart/form-data"> 
                    <div class="form-group"> <label>Tên Lớp</label> 
                        <input type="text" class="form-control" name="tenlop" placeholder="Tên Lớp"> 
                    </div> 
                    <div class="col-md-6 form-group2">
                        <select name="lop" id="lop" onchange="change_country(this.value)" class="frm-field required lop">
                            <option  disabled="disabled" selected="selected">-- Cấp Lớp --</option>
                            <?php
                            $select = "Select * from LOP";
                            $query = mysql_query($select);

                            while ($row = mysql_fetch_array($query)) {
                                $res = "<option ";
                                $res .="value='" . $row['ID_LOP'] . "'>";
                                $res .=$row['TEN_LOP'];
                                $res .='</option>';
                                echo $res;
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6 form-group2">
                        <select id="mon" name="mon" class="frm-field required mon">
                            <option value=""> --- Môn Học --- </option>
                        </select>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="form-group"> 
                        <label>ID Gia Su</label> 
                        <input type="text" class="form-control" name="id_giasu" placeholder="ID gia su"> 
                    </div> 
                    <div class="form-group"> 
                        <label>Nội dung bao quát</label> 
                        <input type="text" class="form-control" name="gioithieu" placeholder="Nội dung bao quát"> 
                    </div> 
                    <div class="clearfix"> </div>

                    <div class="form-group"> 
                        <label>Hình</label> 
                        <input type="file" name="img">
                    </div> 
                    <div class="form-group"> 
                        <label >Ngày Khai Giảng</label> 
                        <input type="date" name="ngaymo"> 
                    </div>
                    <div class="clearfix"> </div>
                    <div class="form-group1"> 
                        <label>Nội dung chi tiết chiêu sinh</label> 
                        <textarea name="ndct" style="resize: none;"></textarea>
                        <script>
                            config = {};
                            config.entities_latin = false;
                            config.language = 'vi';
                            CKEDITOR.replace('ndct', config);

                        </script>

                    </div>
                    <button name="submit" type="submit" class="btn btn-default">Đăng</button> 

                </form> 


            </div>

        </div>


        <!--//forms-inner-->
    </div> 
    <!--//forms-->											   
</div>
<br/>