<?php
$sotin = 10;
if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    settype($trang, "int");
    if ($trang == 0) {
        $trang = 1;
    }
} else {
    $trang = 1;
}
$from = ($trang - 1) * $sotin;
// tổng số trang tin
$select = "SELECT * FROM `chieusinh` order by ID_CHIEUSINH DESC";
$qr = mysql_query($select);
$tongsotin = mysql_num_rows($qr);
$tongsotrang = ceil($tongsotin / $sotin);

?>
<div class="outter-wp">
    <!--/sub-heard-part-->
    <div class="sub-heard-part">
        <ol class="breadcrumb m-b-0">
            <li><a href="index.php?p=5">Mở lớp</a></li>
            <li>Danh Sách Lớp</li>
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
                            $select = "Select * from chieusinh inner join image on chieusinh.ID_IMG = image.ID_IMG order by ID_Chieusinh DESC LIMIT $from,$sotin";
                            $qr = mysql_query($select);
                            while($row = mysql_fetch_array($qr)){
                            
                            ?>
                            <tr class="table-row">
                                <td>
                                    <img width="200px" height="auto" src="../<?php echo $row['NAME_IMG']?>" alt="" />
                                </td>
                                <td class="table-text">
                                    <h6><?php echo $row['TEN_CHIEUSINH']?></h6>
                                    
                                </td>
                                <td>
                                    <div> 
                                    <?php 
                                    $select_sl = "select * from dangkychieusinh";
                                    $qr_sl = mysql_query($select_sl);
                                    if(mysql_fetch_array($qr_sl)!=0){
                                        $sogiasu = mysql_fetch_array($qr_sl);
                                        echo count($sogiasu);
                                        }
                                        else echo '0';
                                    ?>
                                    </div>
                                </td>
                                
                                <td >
                                    <a href="danhsachhocvien.php?p=<?php echo $row['ID_CHIEUSINH']; ?>"> Danh sách học viên </a>
                                </td>
                                <td >
                                    <a style="padding: 10px 20px 10px 20px; background-color: #CECDCD;" href="admin/xoalop.php?p=<?php echo $row['ID_CHIEUSINH']; ?>"> Xóa </a>
                                </td>
                            </tr>
                            <?php 
                             }
                            ?>
                        </tbody>
                    </table>
						<!--phân trang-->
                <nav style="text-align: center;">
                    <ul class="pagination">
                        <li class="<?php if ($i == 0) echo 'disabled'; ?>">
                            <a href="index.php?p=6&i=<?php
                            if (isset($_GET["i"])) {
                                $i = $_GET["i"];
                                $i = $i - 5;
                            } else {
                                $i = 0;
                            }
                            if ($i < 0) {
                                $i = 0;
                            } echo $i;
                            ?>&trang=<?php
                               if ($i == 0) {
                                   echo $i + 1;
                               } else {
                                   echo $i;
                               }
                               ?>"><span aria-hidden="true">&laquo;</span></a></li>
                            <?php
                            for ($j = 1; $j <= 5; $j++) {
                                $i++;
                                ?>
                            <li><a href="index.php?p=6&i=<?php
                                if ($i % 5 == 0) {
                                    echo $i;
                                } else {
                                    $temb = (int) ($i / 5);
                                    echo (($temb * 5) + 5);
                                }
                                ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php }
                            ?>
                        <li class="<?php if ($i >= $tongsotrang) echo 'disabled'; ?>">
                            <a href="index.php?p=6&i=<?php echo $i = $i + 5; //if ($i >= $tongsotrang){echo $i;} //else {echo $i = $i + 5;}     ?>&trang=<?php echo $i - 4; ?>"><span aria-hidden="true">&raquo;</span></a></li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"> </div> 
<br/>