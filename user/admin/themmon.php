<div class="forms-main" id="capnhat">
    <h2 class="inner-tittle"><center>Thêm Môn Học</center></h2>
    <div class="graph-form">
        <div class="validation-form">
            <form method="POST">
                <?php
                if(isset($_POST['submit'])){
                    $id_lop = $_POST['lop'];
                    $id_mon = $_POST['id_mon'];
                    $tenmon = $_POST['tenmon'];
                    $kt = "SELECT * FROM `monhoc` WHERE ID_LOP='$id_lop' and ID_MONHOC='$id_mon'";
                    $qr_kt = mysql_query($kt);
                    $row = mysql_fetch_array($qr_kt);
                    if($row!=0){
                        echo'<div style="color: red"><center> Lớp đã mỡ rồi </center> </div>';
                    }else{
                        $insert ="INSERT INTO `monhoc`(`ID_MONHOC`, `ID_LOP`, `TEN_MONHOC`) VALUES ('$id_mon','$id_lop','$tenmon')";
                        mysql_query($insert);
                      
                    }
                }
                
                ?>
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
                <div class="vali-form">
                    <div class="col-md-10 form-group1">
                        <label class="control-label">ID Môn học</label>
                        <input type="text" placeholder="ID Môn" required="" name="id_mon">
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-10 form-group1 group-mail">
                    <label class="control-label">Tên môn hoc</label>
                    <input type="text" placeholder="Tên môn" required="" name="tenmon">
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