<div id="chuyennganh" class="forms-main">                     
    <h2 class="inner-tittle"><center>Cập Nhật Chuyên Ngành</center></h2>
    <div class="graph-form">
        <div class="validation-form">
            <form method ="GET">
                <div class="vali-form">
                    <div class="col-md-12 form-group2 group-mail">
                        <?php
                        if (isset($_GET["btnCapnhat"])) {
                            if (!isset($_GET["khoinganh"]))
                                $_GET["khoinganh"] = NULL;
                            if (!isset($_GET["chuyennganh"]))
                                $_GET["chuyennganh"] = NULL;
                            if (!isset($_GET["trinhdo"]))
                                $_GET["trinhdo"] = NULL;
                            capnhatchuyennganh($_GET["khoinganh"], $_GET["chuyennganh"], $_GET["trinhdo"], $_SESSION["ID_GS"]);
                        }
                        ?>
                        <label class="control-label">Lĩnh vực</label>
                        <select name="khoinganh">
                            <option value="" disabled="disabled" selected='selected'>--Lĩnh vực--</option>     
                            <?php
                            $qr = "SELECT * FROM khoinganh ";
                            $query = mysql_query($qr);
                            $qr1 = "SELECT * FROM giasu WHERE ID_GS = " . $_SESSION["ID_GS"];
                            $query1 = mysql_query($qr1);
                            $row_user = mysql_fetch_array($query1);
                            while ($row_khoinganh = mysql_fetch_array($query)) {
                                ?>
                                <option value="<?php echo $row_khoinganh['ID_KHOINGANH']; ?>" <?php if ($row_user['ID_KHOINGANH'] == $row_khoinganh['ID_KHOINGANH']) echo "selected='selected'"; ?>><?php echo $row_khoinganh['TEN_KHOINGANH']; ?></option>         
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Chuyên Ngành</label>
                    <?php
                    $qr = "SELECT * FROM giasu WHERE ID_GS = " . $_SESSION["ID_GS"];
                    $query = mysql_query($qr);
                    $row_chuyennganh = mysql_fetch_array($query);
                    ?>
                    <input name="chuyennganh" type="text" placeholder="<?php if ($row_chuyennganh["CHUYENNGANH_GS"] == NULL) echo "--Tên chuyên ngành--";
                    else echo $row_chuyennganh["CHUYENNGANH_GS"]; ?>">
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Trình độ</label>
                    <select name="trinhdo">
                        <option value="NULL" disabled="disabled" selected="selected">--Trình độ--</option> 
                        <?php
                        $qr = "SELECT * FROM trinhdo ";
                        $query = mysql_query($qr);
                        while ($row_trinhdo = mysql_fetch_array($query)) {
                            ?>
                            <option value="<?php echo $row_trinhdo['ID_TRINHDO']; ?>" <?php if ($row_user["ID_TRINHDO"] == $row_trinhdo["ID_TRINHDO"]) echo "selected='selected'"; ?>><?php echo $row_trinhdo['TEN_TRINHDO']; ?></option>         
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="clearfix"> </div>
                <input id="btnDangky" name="p" type="hidden" value="4">
                <div class="col-md-12 form-group button-2">
                    <button name="btnCapnhat" type="submit" class="btn btn-primary">Cập Nhật</button>
                </div>
                <div class="clearfix"> </div>
            </form>
        </div>
    </div>
</div>