
<?php
    include_once '../core/CRUD.php';
     $db = new CRUD();
    $lop=$db->select(Table::tbkqdrl);
    $numrow = $db->num_rows();

?>


<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê điểm rèn luyện theo khoa </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="panel panel-default">
                        <div class="panel-heading">
                           Danh sách điểm rèn luyện 
                        </div>
                        
                        <!-- /.panel-heading -->
                        <form method="post" action="include/export_khoaexcel.php" id="frm1">
                        <div class="panel-body">
                            <div class="table-responsive" id="dvData" >
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align: center;">Mã sinh viên</th>
                                            <th style="text-align: center;">Lớp</th>
                                            <th style="text-align: center;">Tiêu chí 1</th>
                                            <th style="text-align: center;">Tiêu chí 2</th>
                                            <th style="text-align: center;">Tiêu chí 3</th>
                                            <th style="text-align: center;">Tiêu chí 4</th>
                                            <th style="text-align: center;">Tiêu chí 5</th>
                                            <th style="text-align: center;">Tổng điểm</th>
                                            <th style="text-align: center;">Phân loại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php   
                                                //Kiểm tra xem có dữ liệu hay không,
                                                if($numrow>0){
                                                     //Nếu có dữ liệu
                                                    $data=$db->fetch(); 
                                                // đọc từng dòng dữ liệu và hiển thị
                                                    $i=0;
                                                    foreach($data as $row){
                                                        $i++;
                                            ?>
                                        <tr>
                                            <td >
                                                <input type="checkbox" value="<?php echo $row['MaKQDRLCB']; ?>"
                                                id="chk_<?php echo $row['MaKQDRLCB'];?>" 
                                                name="chk_<?php echo $i; ?>"  />
                                            </td>
                                            <td style="text-align: center;"><?php echo $row['MSV'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Lop'];?></td>
                                            <td style="text-align: center;"><?php echo $row['TC1'];?></td>
                                            <td style="text-align: center;"><?php echo $row['TC2'];?></td>
                                            <td style="text-align: center;"><?php echo $row['TC3'];?></td>
                                            <td style="text-align: center;"><?php echo $row['TC4'];?></td>
                                            <td style="text-align: center;"><?php echo $row['TC5'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Tongdiem'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Phanloai'];?></td>
                                           
                                           
                                                </tr>
                                                <tr>
                                                </tr>
                                                 <?php
                                                        }// end while
                                                    }// 
                                                    else{       
                                                 ?>
                                                <tr>
                                                    <td colspan="10" style="text-align: center;"> 
                                                        Không điểm rèn luyện nào !
                                                    </td>
                                                </tr>   
                                                <?php }
                                                //end if
                                                 ?>
                                                <tr>
                                                    <td colspan="10"></td>
                                                </tr>
                                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <input type="submit" class="btn btn-success" id="excel" name="excel" value="Xuất ra Excel"></input>
                    </form>

