<?php
require '../php/dbc.php';
?>
<div id="dangky_noiday" class="forms-main">    
    <h2 class="inner-tittle"><center>Đăng Ký Nơi Dạy</center></h2>	
<div class="col-md-8" >			
    <div class="graph-form">
        <div class="validation-form">
		 <form method="GET">
            <div class="col-md-12 form-group2 group-mail">
			<?php
				// Đăng ký
				if(isset($_GET["btnDangky"]))
				{
					if(isset($_GET["tinh"]))
					{
						$sql = "SELECT * FROM dangkynoiday WHERE ID_TINH = '".$_GET["tinh"]."' AND ID_GS = ".$_SESSION["ID_GS"];
						$query = mysql_query($sql);
						$num = mysql_num_rows($query);
						$row_dknd = mysql_fetch_array($query);
					// trương hợp thêm tỉnh
					if(isset($_GET["all"]))
					{
						dangkytinh($_GET["tinh"],$_SESSION["ID_GS"]);
					}	
					// trường hợp thêm huyện theo tỉnh
					else
					{
						$sql = "SELECT * FROM huyen WHERE ID_TINH = ".$_GET["tinh"];
						$query = mysql_query($sql);
						$num_sohuyen = mysql_num_rows($query);
						
						$sql1 = "SELECT * FROM dangkynoiday WHERE ID_TINH = ".$_GET["tinh"]." AND ID_GS = ".$_SESSION["ID_GS"];
						$query1 = mysql_query($sql1);
						$j=0;
						//echo $_SESSION["ID_GS"];
						//echo $_GET["tinh"];
						//echo $sql1;
						$num_tinhdk =mysql_num_rows($query1);
						//echo $num_tinhdk;
						if($num_tinhdk!=0){
							while($row_dknd1 = mysql_fetch_array($query1)){
								//echo $num_sohuyen;
								if($row_dknd1['ID_HUYEN']!=NULL){
									for($i=1;$i<=$num_sohuyen;$i++)
									{
										$checki="check".$i;
										if(isset($_GET["$checki"])){
											if($_GET["$checki"]!=$row_dknd1['ID_HUYEN']){
												dangkyhuyentinh($_GET["tinh"],$_SESSION["ID_GS"],$_GET["$checki"],$j);
												$j++;
											}
											else {
												$qr = "SELECT * FROM tinh, huyen WHERE tinh.ID_TINH = huyen.ID_TINH AND huyen.ID_TINH =".$_GET["tinh"]." AND huyen.ID_HUYEN =".$_GET["$checki"];
												//echo $qr;
												$query = mysql_query($qr);
												$row_qr =mysql_fetch_array($query);
												echo "<p style='font-family:Cambridge ; color:red; font-size:18px; text-align:center;'>Bạn đã đăng ký huyện ".$row_qr['TEN_HUYEN']."- ".$row_qr['TEN_TINH']." rồi </p>";
												$j++;
											}
										}
											//echo $_GET["tinh"];
											//$_GET["$checki"]= NULL;
											//$j = dangkyhuyentinh($_GET["tinh"],$_SESSION["ID_GS"],$_GET["$checki"],$j);
										//return $j;
									}
							}
								else {
									echo "<p style='font-family:Cambridge ; color:red; font-size:18px; text-align:center;'>Bạn đã đăng ký dạy toàn tỉnh này rồi! Nếu muốn đăng ký lại vui lòng hủy đăng ký</p>";
									$j++;
									
							}
							}
							
							}
						else {
							for($i=1;$i<=$num_sohuyen;$i++)
								{
									$checki="check".$i;
									if(isset($_GET["$checki"]))
									{
										dangkyhuyentinh($_GET["tinh"],$_SESSION["ID_GS"],$_GET["$checki"],$j);
										$j++;
									}
								}
						}
						if($j==0)
											{
												echo "<p style='font-family:Cambridge ; color:red; font-size:18px; text-align:center;'>Bạn chưa chọn huyện nào cả</p>";
											}
					}
				}
				else echo "<p style='font-family:Cambridge ; color:red;'>Bạn chưa chọn tỉnh</p>";    				
				}
				
			?>
			<?php
					// Hủy đăng ký
				if(isset($_GET["btnHuydangky"]))
				{
					$qr="SELECT * FROM dangkynoiday WHERE ID_GS = ".$_SESSION["ID_GS"];
					$hiendknd = mysql_query($qr);
					$num_hiendknd = mysql_num_rows($hiendknd);
					for($j=1;$j <= $num_hiendknd;$j++)
					{
						$delej="dele".$j;
						if(!isset($_GET[$delej]))
							$_GET[$delej] = NULL;
						 xoadangkynoiday($_SESSION["ID_GS"],$_GET[$delej]);
					}
				}
				
				?>
                <label class="control-label">Tỉnh</label>
				<select name="tinh" id="tinh" class="frm-field required city">
                    <option disabled="disabled" selected="selected">-- Tên tỉnh --</option>
                                            <?php
                                            $select = "Select * from tinh";
                                            $query = mysql_query($select);

                                            while ($row = mysql_fetch_array($query)) {
                                                $res = "<option ";
                                                $res .="value='" . $row['ID_TINH'] . "'>";
                                                $res .=$row['TEN_TINH'];
                                                $res .='</option>';
                                                echo $res;
                                            }
                                            ?>
                </select>
            </div>
            <div class="clearfix"> </div>
            <div class="col-md-12 form-group2 group-mail">
                <label class="control-label">Huyện</label>
					<table class="table">
						<tr><th><input type='checkbox' class="all" name='all' value='all' > Chọn tất cả</th></tr><tr>
					</table>
					<table  name="huyen" id="huyen" class="table huyen">
					</table>
            </div>
            <div class="clearfix"> </div>
			<input id="btnDangky" name="p" type="hidden" value="7">
            <div class="col-md-12 form-group button-2">
				<input id="btnDangky" name="btnDangky" type="submit" class="btn btn-primary" value="Đăng Ký">
            </div>
            <div class="clearfix"> </div>
		</form>
        </div>
    </div>
</div>
<div class="col-md-4">	
<div class="graph-form">
        <div class="validation-form">
		<h3><center>Kết quả đăng ký</center></h3>
					<form method="GET">
					<?php
						$i=0;
						$qr="SELECT * FROM dangkynoiday WHERE ID_GS = ".$_SESSION["ID_GS"];
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
									 "<input type='checkbox' class='all' name='dele".$i."' value='ID_HUYEN = ".$row_hienhuyen["ID_HUYEN"]."'>  ".$row_hienhuyen["TEN_HUYEN"]."- ".$row_tinh["TEN_TINH"]."</br>";
									 
							 else 
								echo "<input type='checkbox' class='all' name='dele".$i."' value='ID_TINH = ".$row_tinh["ID_TINH"]."'>  ".$row_tinh["TEN_TINH"]."</br>";
						
						}
					?>	
                                            <input id="btnDangky" name="p" type="hidden" value="7">
					<input id="btnHuydangky" name="btnHuydangky" type="submit" class="btn btn-primary" value="Huỷ Đăng Ký">
					</form>
            </div>        
            <div class="clearfix"> </div>
        </div>
    </div>
</div>	
</div>