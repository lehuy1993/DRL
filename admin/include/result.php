<?php
	$timkiem=$_GET["q"];	
?>
<?php
	include_once'../core/CRUD.php';
	$db = new CRUD();
$sql="select * FROM kqdrl WHERE tenthat like '%".$timkiem."%' OR Lop like '%".$timkiem."%' OR MSV like '%".$timkiem."%'";	
	$kq=mysql_query($sql);
	$numrow=mysql_num_rows($kq);
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kết quả tìm kiếm <?php echo $timkiem; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="panel panel-default">
                        <div class="panel-heading">


                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align: center;">Mã sinh viên</th>
                                            <th style="text-align: center;">Họ tên</th>
                                            <th style="text-align: center;">Lớp</th>
                                            <th style="text-align: center;">Tổng điểm</th>
                                            <th style="text-align: center;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php   
                                        if ($numrow >0) {
                                         
                                              while($row=mysql_fetch_array($kq))
                                              {

                                            ?>
                                        <tr>
                                            <td >
                                                        <input type="checkbox" 
                                                        id="chk_<?php echo $row['MaKQDRL'];?>" 
                                                        name="chk_<?php echo $row['MaKQDRL'];?>" />
                                            </td>
                                            <td style="text-align: center;"><?php echo $row['MSV'];?></td>
                                            <td style="text-align: center;"><?php echo $row['tenthat'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Lop'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Tongdiem'];?></td>
                                            <td class="td-actions" style="text-align: center;width:20%">
                                                        <a href="?options=drl_edit&MSV=<?php echo $row['MSV'];?>" 
                                                           class="btn btn-small btn-warning" 
                                                           title="Chấm điểm sinh viên có mã[<?php echo $row['MSV'];?>]">
                                                            <i class="btn-icon-only fa fa fa-pencil"> </i>
                                                        </a>
                                                       
                                                    </td>
                                                </tr>
                                                
                                               
                                                <?php } }else {//end if ?> 
                                                <tr>
                                                    <td style="color: red" colspan="5"> 
                                                        Kết quả tìm kiếm không phù hợp ! 
                                                    </td>
                                                </tr>
                                                <?php }//end if ?>               
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
