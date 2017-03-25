<div class="forms-main" id="capnhat">
    <h2 class="inner-tittle"><center>Cập Nhật Thông Tin Gia Sư</center></h2>
    <div class="graph-form">
        <div class="validation-form">
            <form method="POST">
                <?php
                $select = "Select * from `giasu` where ID_GS = ".$_SESSION["ID_GS"];
                $query = mysql_query($select);
                $ctgs = mysql_fetch_array($query);
                if (isset($_POST['submit'])) {
					
                    $erro = array();
                    if (empty($_POST['name'])) {
                        $name = NULL;
                        $erro[] = 'name';
                    } else {
                        $name = $_POST['name'];
                    }
                    if (empty($_POST['sdt'])) {
                        $sdt = NULL;
                        $erro[] = 'sdt';
                    } else {
                        $sdt = $_POST['sdt'];
                    }
                    if (empty($_POST['gioithieu'])) {
                        $gioithieu = NULL;
                        $erro[] = 'gioithieu';
                    } else {
                        $gioithieu = $_POST['gioithieu'];
                    }
                    if (empty($_POST['ngaysinh'])) {
                        $ngaysinh = null;
                        $erro[] = 'ngaysinh';
                    } else {
                        $ngaysinh = $_POST['ngaysinh'];
                    }
                    if (empty($_POST['noicongtac'])) {
                        $noicongtac = NULL;
                        $erro[] = 'noicongtac';
                    } else {
                        $noicongtac = $_POST['noicongtac'];
                    }
                    if (empty($_POST['luongkhoidiem'])) {
                        $luongkhoidiem = NULL;
                        $erro = NULL;
                    } else {
                        $luongkhoidiem = $_POST['luongkhoidiem'];
                    }
                    if (empty($_POST['luongcaonhat'])) {
                        $luongcaonhat = NULL;
                        $erro[] = 'luongcaonhat';
                    } else {
                        $luongcaonhat = $_POST['luongcaonhat'];
                    }
                    $gioitinh = $_POST['gioitinh'];
                   echo count($erro) ;
                    if (count($erro) == 0) {
                        $update = "UPDATE `giasu` SET `TEN_GS`='$name',`GIOITINH_GS`=$gioitinh ,`NGAYSINH_GS`='$ngaysinh',`SDT_GS`=$sdt,`GIOITHIEU_GS`='$gioithieu',`NOICONGTAC_GS`='$noicongtac',`LUONGKHOIDIEM_GS`=$luongkhoidiem,`LUONGCAONHAT_GS`=$luongcaonhat WHERE ID_GS=".$_SESSION["ID_GS"];
                        echo $update;
						mysql_query($update);
						 sleep(1);
                         header('location: capnhatthongtincanhan.php?p=1');
                    }
                    else{$loi=1;}
                }
                ?>
                <div class="vali-form">
                    <div class="col-md-10 form-group1">
                        <label class="control-label">Họ Và  Tên</label>
                        <input type="text" value="<?php echo $ctgs['TEN_GS']; ?>" placeholder="Firstname" required="" name="name">
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="vali-form" >
                    <div class="col-md-12 form-group1">
                        <label for="radio" class="control-label">Giới tính</label>
                        <div class="col-sm-12">
                            <?php
                            if ($ctgs['GIOITINH_GS'] == NULL)
                                $ch = -1;
                            else if ($ctgs['GIOITINH_GS'] == TRUE)
                                $ch = 1;
                            else
                                $ch = 0;
                            ?>
                            <div class="radio-inline"><label><input type="radio" name="gioitinh" value="1" <?php if ($ch == 1) echo 'checked'; ?>> Nam</label></div>
                            <div class="radio-inline"><label><input type="radio" name="gioitinh" value="0"  <?php if ($ch == 0) echo 'checked'; ?>> Nữ</label></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-10 form-group1 group-mail">
                    <label class="control-label">Số điện thoại</label>
                    <input type="text" placeholder="Số Điện Thoại" required="" name="sdt" value="<?php echo $ctgs['SDT_GS'] ?>">
                </div>                                       

                <div class="clearfix"> </div>
                <div class="col-md-10 form-group1 group-mail">
                    <label class="control-label ">Ngày Sinh</label>
                    <input type="date" name="ngaysinh" value="<?php echo $ctgs['NGAYSINH_GS'] ?>" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" required="">
                </div>
                <div class="clearfix"> </div>
                

                
                <div class="clearfix"> </div>
                <div class="col-md-10 form-group1 ">
                    <label class="control-label">Giới thiệu sơ nét</label>
                    <textarea name="gioithieu" placeholder="Giới thiệu sơ nét" required=""><?php echo $ctgs['GIOITHIEU_GS']; ?></textarea>

                </div>
                <div class="clearfix"> </div>
                <div class="col-md-10 form-group1 ">
                    <label class="control-label">Nơi công tác (Học tâp)</label>
                    <textarea name="noicongtac" placeholder="Nơi công tác (Học tâp)" required=""><?php echo $ctgs['NOICONGTAC_GS']; ?></textarea>
                </div>
                <div class="clearfix"> </div>
                <div class="vali-form">
                    <div class="col-md-10"> <label class="control-label">Mức lương đề nghị</label> </div>
                    <div class="col-md-5 form-group1">                                                
                        <input name="luongkhoidiem" type="text" placeholder="Khởi Điểm" required="" value="<?php echo $ctgs['LUONGKHOIDIEM_GS']; ?>">
                    </div>

                    <div class="col-md-5 form-group1 form-last">                                                
                        <input name="luongcaonhat" type="text" placeholder="Lớn Nhất" required="" value="<?php  echo $ctgs['LUONGCAONHAT_GS']; ?>">
                    </div>
                    <div class="clearfix"> </div>
                </div>

				<input id="btnDangky" name="p" type="hidden" value="1">
                <div class="col-md-10 form-group button-2">
                    <button name="submit" type="submit" class="btn btn-primary">Cập Nhật</button>
                    
                </div>
                <div class="clearfix"> </div>
            </form>
        </div>

    </div>
</div> 