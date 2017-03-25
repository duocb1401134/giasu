<div class="outter-wp">
    <!--/sub-heard-part-->
    <div class="sub-heard-part">
        <ol class="breadcrumb m-b-0">
            <li><a href="index.php">Home</a></li>
            <li class="active">Danh Sách gia sư mới đăng ký</li>
        </ol>
    </div>	
    <div class="col-md-12 tab-content tab-content-in">
        <div class="tab-pane active text-style" id="tab1">
            <div class="inbox-right">
                <div class="mailbox-content">
                    <table class="table">
                        <tbody>
                            <?php
                            $select = "SELECT * FROM giasu INNER JOIN image ON giasu.ID_IMG = image.ID_IMG order by ID_GS DESC";
                            $qr = mysql_query($select);
                            while($row = mysql_fetch_array($qr)){                              
                           
                            ?>
                            <tr class="table-row">
                                <td>
                                    <img width="200px" height="auto" src="<?php echo $row['NAME_IMG']?>" alt="" />
                                </td>
                                <td class="table-text">
                                    <h6><?php echo $row['TEN_GS'] ?></h6>
                                    <p><?php echo $row['GIOITHIEU_GS'] ?></p>
                                </td>  
                                <td >
                                    <a href="admin/xoags_moi.php?p=<?php echo $row['ID_GS']; ?>"> Xóa </a>
                                </td>
                                <td >
                                    <a href="admin/xemgs.php?p=<?php echo $row['ID_GS']; ?>"> Chi Tiết </a>
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