<div class="outter-wp">
    <!--/sub-heard-part-->
    <div class="sub-heard-part">
        <ol class="breadcrumb m-b-0">
            <li><a href="index.php">Home</a></li>
            <li class="active">Danh sách học viên đăng ký gia sư</li>
        </ol>
    </div>	
    <div class="col-md-12 tab-content tab-content-in">
        <div class="tab-pane active text-style" id="tab1">
            <div class="inbox-right">
                <div class="mailbox-content">
                    <table class="table">
                        <tbody>
                            <?php
                            $select = "SELECT * FROM `hocvien` WHERE ID_GS <> 'null' order by ID_HOCVIEN DESC";
                            $qr = mysql_query($select);
                            while($row = mysql_fetch_array($qr)){                              
                           
                            ?>
                            <tr class="table-row">
                                
                                <td class="table-text">
                                    <h6><?php echo $row['ID_HOCVIEN']?></h6>                                                                
                                </td> 
                                <td class="table-text">
                                     <h6><?php echo $row['TEN_HOCVIEN']?></h6>       
                                </td>
                                <td class="table-text">
                                     <h6><?php echo $row['SDT_HOCVIEN']?></h6>       
                                </td>
                                <td class="table-text">
                                    <h6><?php echo $row['EMAIL__HOCVIEN']?></h6>                                                                
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