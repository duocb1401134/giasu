<?php
				if(isset($_GET["submit"]))
				{
					$qr="SELECT * FROM `buoitrongngay` WHERE ID_GS = ".$_SESSION["ID_GS"];
					$kiemtra = mysql_query($qr);
					$num= mysql_num_rows($kiemtra); 
					if($num == 0)
					{
						$qr="INSERT INTO `buoitrongngay`(`ID_GS`, `ST2`, `ST3`, `ST4`, `ST5`, `ST6`, `ST7`, `SCN`, `CT2`, `CT3`, `CT4`, `CT5`, `CT6`, `CT7`, `CCN`, `TT2`, `TT3`, `TT4`, `TT5`, `TT6`, `TT7`, `TCN`) VALUES (".$_SESSION["ID_GS"].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
						mysql_query($qr);
					}
					if(!isset($_GET["ST2"]))
					{
						$_GET["ST2"]=0;
					}
					if(!isset($_GET["ST3"]))
					{
						$_GET["ST3"]=0;
					}
					if(!isset($_GET["ST4"]))
					{
						$_GET["ST4"]=0;
					}
					if(!isset($_GET["ST5"]))
					{
						$_GET["ST5"]=0;
					}
					if(!isset($_GET["ST6"]))
					{
						$_GET["ST6"]=0;
					}
					if(!isset($_GET["ST7"]))
					{
						$_GET["ST7"]=0;
					}
					if(!isset($_GET["SCN"]))
					{
						$_GET["SCN"]=0;
					}
					if(!isset($_GET["TT2"]))
					{
						$_GET["TT2"]=0;
					}
					if(!isset($_GET["TT3"]))
					{
						$_GET["TT3"]=0;
					}
					if(!isset($_GET["TT4"]))
					{
						$_GET["TT4"]=0;
					}
					if(!isset($_GET["TT5"]))
					{
						$_GET["TT5"]=0;
					}
					if(!isset($_GET["TT6"]))
					{
						$_GET["TT6"]=0;
					}
					if(!isset($_GET["TT7"]))
					{
						$_GET["TT7"]=0;
					}if(!isset($_GET["TCN"]))
					{
						$_GET["TCN"]=0;
					}
					if(!isset($_GET["CT2"]))
					{
						$_GET["CT2"]=0;
					}
					if(!isset($_GET["CT3"]))
					{
						$_GET["CT3"]=0;
					}
					if(!isset($_GET["CT4"]))
					{
						$_GET["CT4"]=0;
					}
					if(!isset($_GET["CT5"]))
					{
						$_GET["CT5"]=0;
					}
					if(!isset($_GET["CT6"]))
					{
						$_GET["CT6"]=0;
					}
					if(!isset($_GET["CT7"]))
					{
						$_GET["CT7"]=0;
					}if(!isset($_GET["CCN"]))
					{
						$_GET["CCN"]=0;
					}
					$qr="UPDATE `buoitrongngay` SET `ST2`='".$_GET["ST2"]."',`ST3`='".$_GET["ST3"]."',`ST4`='".$_GET["ST4"]."',`ST5`='".$_GET["ST5"]."',`ST6`='".$_GET["ST6"]."',`ST7`='".$_GET["ST7"]."',`SCN`='".$_GET["SCN"]."',`CT2`='".$_GET["CT2"]."',`CT3`='".$_GET["CT3"]."',`CT4`='".$_GET["CT4"]."',`CT5`='".$_GET["CT5"]."',`CT6`='".$_GET["CT6"]."',`CT7`='".$_GET["CT7"]."',`CCN`='".$_GET["CCN"]."',`TT2`='".$_GET["TT2"]."',`TT3`='".$_GET["TT3"]."',`TT4`='".$_GET["TT4"]."',`TT5`='".$_GET["TT5"]."',`TT6`='".$_GET["TT6"]."',`TT7`='".$_GET["TT7"]."',`TCN`='".$_GET["TCN"]."' WHERE ID_GS=".$_SESSION["ID_GS"];
					mysql_query($qr);
					 sleep(1);
                     header('location: ../user/capnhatthongtincanhan.php?p=8');
				}
				
			?>
<?php
        $sql = "select * from `buoitrongngay` where ID_GS=".$_SESSION["ID_GS"];
        $query = mysql_query($sql);
        $rows_thoigian = mysql_fetch_array($query);
        ?>
<div id="dangky_buoiday" class="forms-main">    
    <h2 class="inner-tittle"><center>Thời Gian Biểu</center></h2>
    <form method="GET"> 
        <div class="graph-form">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Thứ 2</th>
                        <th>Thứ 3</th>
                        <th>Thứ 4</th>
                        <th>Thứ 5</th>
                        <th>Thứ 6</th>
                        <th>Thứ 7</th>
                        <th>Chủ Nhật</th>
                    </tr>


                    <tr>
                        <td>Sáng</td>
                        <th><input type="checkbox" name="ST2" value="1" <?php if ($rows_thoigian['ST2'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="ST3" value="1" <?php if ($rows_thoigian['ST3'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="ST4" value="1" <?php if ($rows_thoigian['ST4'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="ST5" value="1" <?php if ($rows_thoigian['ST5'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="ST6" value="1" <?php if ($rows_thoigian['ST6'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="ST7" value="1" <?php if ($rows_thoigian['ST7'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="SCN" value="1" <?php if ($rows_thoigian['SCN'] == 1) echo 'checked'; ?> ></th>

                    </tr>
					<tr>
                        <td>Chiều</td>
                        <th><input type="checkbox" name="CT2" value="1" <?php if ($rows_thoigian['CT2'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="CT3" value="1" <?php if ($rows_thoigian['CT3'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="CT4" value="1" <?php if ($rows_thoigian['CT4'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="CT5" value="1" <?php if ($rows_thoigian['CT5'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="CT6" value="1" <?php if ($rows_thoigian['CT6'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="CT7" value="1" <?php if ($rows_thoigian['CT7'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="CCN" value="1" <?php if ($rows_thoigian['CCN'] == 1) echo 'checked'; ?> ></th>

                    </tr>
					<tr>
                        <td>Tối</td>
                        <th><input type="checkbox" name="TT2" value="1" <?php if ($rows_thoigian['TT2'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="TT3" value="1" <?php if ($rows_thoigian['TT3'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="TT4" value="1" <?php if ($rows_thoigian['TT4'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="TT5" value="1" <?php if ($rows_thoigian['TT5'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="TT6" value="1" <?php if ($rows_thoigian['TT6'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="TT7" value="1" <?php if ($rows_thoigian['TT7'] == 1) echo 'checked'; ?> ></th>
                        <th><input type="checkbox" name="TCN" value="1" <?php if ($rows_thoigian['TCN'] == 1) echo 'checked'; ?> ></th>

                    </tr>
                   

                </tbody>
            </table>
        </div>
        <div class="clearfix"> </div>
		<input id="btnDangky" name="p" type="hidden" value="8">
        <div class="col-md-12 form-group button-2">
            <button type="submit" name="submit" class="btn btn-primary">Cập Nhật</button>
				
        </div>
    </form>
</div>





