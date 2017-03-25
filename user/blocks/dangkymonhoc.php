<div id="dangky_mon" class="forms-main">                     
    <h2 class="inner-tittle"><center>Đăng Ký môn</center></h2>
    <div class="col-md-6" >	
        <div class="graph-form">
            <div class="validation-form">
                <!---->
				<?php
                    if (isset($_GET["btnDangky"])) {
                        if (isset($_GET["lop"])) {
                            $qr = "SELECT * FROM day WHERE ID_LOP = " . $_GET["lop"];
                            $query = mysql_query($qr);
                            if ($query == NULL) {
                                $num_day = 0;
                            } else {
                                $num_day = mysql_num_rows($query);
                            }
                            //Đăng ký all môn
                            if (isset($_GET["all"])) {
                                dangkyall($_GET["lop"],$_SESSION["ID_GS"]);
                            }
                            // Đăng ký từng môn
                            else {
                               $qr = "SELECT * FROM monhoc WHERE ID_LOP = '" . $_GET["lop"]."'";
                                $query = mysql_query($qr);
                                $num_somon = mysql_num_rows($query);
                                $j = 0;
                                for ($i = 1; $i <= $num_somon; $i++) {
                                    $checki = "check" . $i;
									if(!isset($_GET["$checki"]))
										$_GET["$checki"] = NULL;
										$j = dangkytungmon($_GET["lop"],$_SESSION["ID_GS"],$_GET["$checki"],$j);
										//echo $j;
									  }
                                if ($j == 0)
                                    echo "<p style='font-family:Cambridge ; color:red; font-size:18px; text-align:center;'>Bạn chưa chọn môn nào</p>";
                            }
                        } else
                            echo "<p style='font-family:Cambridge ; color:red; font-size:18px; text-align:center;'>Bạn chưa chọn lớp</p>";
                    }
                    ?>
                    <?php
                    // Hủy đăng ký
                    if (isset($_GET["btnHuydangky"])) {
						$qr = "SELECT * FROM day WHERE ID_GS = '" . $_SESSION["ID_GS"]."'";	
                        $hienday = mysql_query($qr);
                        $num_hienday = mysql_num_rows($hienday);
                        for ($j = 1; $j <= $num_hienday; $j++) {
                            $delej = "dele" . $j;
							if (!isset($_GET[$delej])) 
								$_GET[$delej] = NULL;
								xoadangkymon($_SESSION["ID_GS"],$_GET[$delej] );
                    }
					}
                    ?>
                <form method="GET">
                    <div class="vali-form">
                        <div class="col-md-12 form-group2 group-mail">
                            <label class="control-label">Lớp</label>
                            <select name="lop" id="lop" onchange="change_country(this.value)" class="frm-field required lop">
                                <option  disabled="disabled" selected="selected">-- Cấp Lớp --</option>
                                <?php
                                $Hienlop = Hienlop();
                                while ($row_lop = mysql_fetch_array($Hienlop)) {
                                    ?>

                                    <option value="<?php echo $row_lop['ID_LOP'] ?>"><?php echo $row_lop['TEN_LOP'] ?></option>         
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="col-md-12 form-group2 group-mail">
                        <label class="control-label">Môn</label>
                        <table class="table">
                            <tr><th><input type='checkbox' class="all" name='all' value='all' > Chọn tất cả các môn</th></tr><tr>
                        </table>
                        <table  name="mon" id="mon" class="table mon">
                        </table>
                    </div>
                    <div class="clearfix"> </div>
                    <input id="btnDangky" name="p" type="hidden" value="5">
                    <div class="col-md-12 form-group button-2">
                        <input id="btnDangky" name="btnDangky" type="submit" class="btn btn-primary" value="Đăng Ký">
                    </div>
                    <div class="clearfix"> </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6" >	
        <div class="graph-form">
            <div class="validation-form">
                <h3><center>Kết quả đăng ký</center></h3>
                <form method="GET">
                    <?php
                    $i = 0;
                    $qr = "SELECT * FROM day WHERE ID_GS = " . $_SESSION["ID_GS"];
                    $hienday = mysql_query($qr);
                    while ($row_hienday = mysql_fetch_array($hienday)) {
                        $i++;
                        $hienmon = Hienmonday_GS($row_hienday["ID_MONHOC"]);
                        $row_hienmon = mysql_fetch_array($hienmon);
                        $hienlop = Hienlopday_GS($row_hienmon["ID_LOP"]);
                        $row_hienlop = mysql_fetch_array($hienlop);
                        echo "<input type='checkbox' class='all' name='dele" . $i . "' value='" . $row_hienday["ID_MONHOC"] . "'>  " . $row_hienmon["TEN_MONHOC"] . "- " . $row_hienlop["TEN_LOP"] . "</br>";
                       
                    }
                    ?>	
                     <input id="btnDangky" name="p" type="hidden" value="5">
                    <input id="btnHuydangky" name="btnHuydangky" type="submit" class="btn btn-primary" value="Huỷ Đăng Ký">
                </form>
            </div>
        </div>
    </div>
</div>