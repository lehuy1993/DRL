<?php
    include_once '../core/CRUD.php';
	 $conn = mysql_connect("localhost","root","") or die(mysql_error() );
    mysql_select_db("ttcn",$conn);
     mysql_query('SET NAMES "UTF-8"');
	$sql = "SELECT kqdrl.* , sinhvien.MSV FROM sinhvien,kqdrl where kqdrl.MSV = sinhvien.MSV";
	$result = mysql_query($sql);
    $db= new CRUD();
    $db->delete(Table::tbsinhvien);

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
                        <form method="post" action="" id="frm1">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align: center;">Mã sinh viên</th>
                                            <th style="text-align: center;">Họ tên</th>
                                            <th style="text-align: center;">Phân loại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php   
                                                //Kiểm tra xem có dữ liệu hay không,
                                                while ($row=mysql_fetch_array($result)) {
                                                
                
                                            ?>
                                        <tr>
                                            <td >
                                                <input type="checkbox" value="<?php echo $row['MaKQ']; ?>"
                                                id="chk_<?php echo $row['MaKQ'];?>" 
                                                name="chk_<?php echo $i; ?>"  />
                                            </td>
                                            <td style="text-align: center;"><?php echo $row['MSV'];?></td>
                                            <td style="text-align: center;"><?php echo $row['tenthat'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Phanloai'];?></td>
                                           
                                           
                                                </tr>
                                                <tr>
                                                </tr>
                                                 <?php
                                                        }// end while
                                                          
                                                 ?>
                                                
                                               
                                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </form>

