<div id="capnhatanh" class="forms-main">                     
    <h2 class="inner-tittle"><center>Cập Nhật Ảnh Đại Điện</center></h2>
    <div class="graph-form">
        <div class="validation-form">
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
                        $dir = "images/avatar";
                        if (is_dir($dir)) {
                            
                        } else {
                            mkdir($dir);
                        }
                        $upload_path = $dir . "/" . $img_name;
                        //echo $upload_path;
                        move_uploaded_file($_FILES['img']['tmp_name'], '../'.$upload_path);
                        $sql = "INSERT INTO `image`(`ID_IMG`, `NAME_IMG`, `MOTA`) VALUES (null,'$upload_path',null)";
						mysql_query($sql);						
						$last_id = mysql_insert_id($conn);
                        $sqlupdate="UPDATE `giasu` SET `ID_IMG`=$last_id WHERE ID_GS=".$_SESSION["ID_GS"];  
                        mysql_query($sqlupdate);
                        
                    }
                } 
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="vali-form">
                    <div class="col-md-12 form-group1">
                        <label  class="control-label">Chọn Hình</label>
                        <input type="file" name="img">
                    </div>

                    <div class="clearfix"> </div>
                </div>

                <div class="clearfix"> </div>
				<input id="btnDangky" name="p" type="hidden" value="3">
                <div class="col-md-12 form-group button-2">
                    <button type="submit" name="submit" class="btn btn-primary">Cập Nhật</button>

                </div>
                <div class="clearfix"> </div>

            </form>
        </div>
    </div>
</div>