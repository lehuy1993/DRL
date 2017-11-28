
<?php
    include_once '../core/CRUD.php';
     $MaL=isset($_REQUEST['TenL'])?$_REQUEST['TenL']:" ";
     $where = array('lop' => $_REQUEST['TenL'] , );
     $db = new CRUD();
    $lop=$db->select(Table::tbkqdrl,$where);
    $numrow = $db->num_rows();

?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê điểm rèn luyện theo lớp </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="panel panel-default">
                        <div class="panel-heading">
                           Danh sách điểm rèn luyện 
                        </div>
                        <div class="panel-body">
                        <ul>
                        <a>Lọc theo lớp</a>
                        <div class = "btn-group">
                                        <select class = "form-control" name = "MaMDRL" 
                                            onChange="location.href='?options=ketqua_lop&TenL='+this.value;">
                                            <option value="0">---Tất cả---</option>
                                                <?php    
                                                    $dbloai=new CRUD();
                                                    $dbloai->select(Table::tblop);
                                                    $num=$dbloai->num_rows();
                                                    if($num>0){
                                                        $data1=$dbloai->fetch();
                                                        foreach ($data1 as $row1) {
                                                           echo '<option value="' . $row1['TenL'] .'"';
                                                            if($row1['TenL']== $MaL)  echo "selected"; 
                                                            echo '>' . $row1['TenL'] . '</option>';
                                                        }
                                                    }
                                                ?>   
                                       </select>
                        </div>
                        </ul>
                        </div>  
                        <!-- /.panel-heading -->
                        <form method="post" action="include/export_lopexcel.php" id="frm1" enctype="multipart/form-data">
                        <div class="panel-body">
                        <input type="hidden" value="<?php echo $MaL; ?>" name="MaL" ></input>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align: center;">Mã sinh viên</th>
                                            <th style="text-align: center;">Lớp</th>
                                            <th style="text-align: center;">Họ tên</th>
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
                                            <td style="text-align: center;"><?php echo $row['tenthat'];?></td>
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
                                                    <td colspan="11" style="text-align: center;"> 
                                                        Không điểm rèn luyện nào !
                                                    </td>
                                                </tr>   
                                                <?php }
                                                //end if
                                                 ?>
                                                <tr>
                                                    <td colspan="11"></td>
                                                </tr>
                                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                                        <input type="submit" class="btn btn-success" name="excel" value="Xuất ra Excel"></input>

                    </form>
 <?php
 ob_flush();
 ?>