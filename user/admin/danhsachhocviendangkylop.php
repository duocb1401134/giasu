<?php
if (isset($_GET["p"])) {
    $ID_LOP = $_GET["p"];
}
?> 
<div class="outter-wp">
    <!--/sub-heard-part-->
    <div class="sub-heard-part">
        <ol class="breadcrumb m-b-0">
            <li><a href="index.php">Home</a></li>
            <li class="active">Danh Sách lớp học</li>
        </ol>
    </div>	

    <!-- tab content -->
    <div class="col-md-12 tab-content tab-content-in">
        <div class="tab-pane active text-style" id="tab1">
            <div class="inbox-right">
                <div class="mailbox-content">
                    <table class="table">
                        <tbody>
                            <?php
                            $select = "Select * from dangkychieusinh inner join hocvien on dangkychieusinh.ID_HOCVIEN = hocvien.ID_HOCVIEN where ID_CHIEUSINH = $ID_LOP order by dangkychieusinh.ID_HOCVIEN DESC";
                            $qr = mysql_query($select);
                            while ($row = mysql_fetch_array($qr)) {
                                ?>
                                <tr class="table-row">

                                    <td class="table-text">
                                        <h6><?php echo $row['ID_HOCVIEN'] ?></h6>
                                    </td>
                                    <td class="table-text">
                                        <h6><?php echo $row['TEN_HOCVIEN'] ?></h6>
                                    </td>

                                    <td >
                                         <h6><?php echo $row['EMAIL_HOCVIEN'] ?></h6>
                                    </td>
                                    <td >
                                       <h6><?php echo $row['SDT_HOCVIEN'] ?></h6>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"> </div> 