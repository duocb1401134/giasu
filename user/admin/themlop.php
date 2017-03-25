<div class="forms-main" id="capnhat">
    <h2 class="inner-tittle"><center>Thêm Lớp</center></h2>
    <div class="graph-form">
        <div class="validation-form">
            <form method="POST">
                <?php
                if(isset($_POST['submit'])){
                    $id_lop = $_POST['id_lop'];
                    $tenlop = $_POST['tenlop'];
                    $kt = "select * from lop where ID_LOP='$id_lop'";
                    $qr_kt = mysql_query($kt);
                    $row = mysql_fetch_array($qr_kt);
                    if($row!=0){
                        echo 'Lớp tồn tại';
                    }else{
                        $insert ="INSERT INTO `lop`(`ID_LOP`, `TEN_LOP`) VALUES ('$id_lop','$tenlop')";
                        mysql_query($insert);
                      
                    }
                }
                
                ?>
                <div class="vali-form">
                    <div class="col-md-10 form-group1">
                        <label class="control-label">ID Lớp</label>
                        <input type="text" placeholder="ID lớp" required="" name="id_lop">
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-10 form-group1 group-mail">
                    <label class="control-label">Tên Lớp</label>
                    <input type="text" placeholder="Tên Lớp" required="" name="tenlop">
                </div>                                       
                <div class="clearfix"> </div> 
                
                <input id="btnDangky" name="p" type="hidden" value="1">
                <div class="col-md-10 form-group button-2">
                    <button name="submit" type="submit" class="btn btn-primary">Cập Nhật</button>
                </div>
                <div class="clearfix"> </div>
            </form>
        </div>

    </div>
</div> 
<br/>