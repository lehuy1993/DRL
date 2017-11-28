<?php
	if (isset($_POST['xemdiem'])) {
		$MSV = $_POST['MSV'];
		$db = new CRUD();
		$where = array('MSV' => $MSV, );
		$db->select(TABLE:: tbkqdrl,$where);
	$numrow = $db->num_rows();
	}
?>

<div class="panel panel-default">
                       <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Xem điểm rèn luyện sinh viên có mã <?php echo $MSV; ?>  </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Mã sinh viên</th>
                                            <th style="text-align: center;">Họ tên</th>
                                            <th style="text-align: center;">Lớp</th>
                                            <th style="text-align: center;">Tổng điểm</th>
                                            <th style="text-align: center;">Phân loại</th>
                                            <th style="text-align: center;">Học kỳ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php   
                                                                                       //Kiểm tra xem có dữ liệu hay không,
                                                if($numrow>0){
                                                     //Nếu có dữ liệu
                                                    $data=$db->fetch(); 
                                                // đọc từng dòng dữ liệu và hiển thị
                                                    foreach($data as $row){

                                            ?>
                                        <tr>
                                            
                                            <td style="text-align: center;"><?php echo $row['MSV'];?></td>
                                            <td style="text-align: center;"><?php echo $row['tenthat'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Lop'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Tongdiem'];?></td>
											 <td style="text-align: center;"><?php echo $row['Phanloai'];?></td>
                                            <?php
                                                $db =  new CRUD;
                                                $HK = $row['MaHK'];
                                                $where = array("MaHK"=>$HK,);
                                                $dbhk =$db->select(TABLE::tbhocky,$where);
                                                $row1 = $db->fetch();
                                            ?>
											 <td style="text-align: center;"><?php echo $row1[0]['TenHK']." - ".$row1[0]['TenNH'];?></td>
                                                </tr>
                                                 <?php
                                                        }// end while
                                                    }// 
                                                    else{       
                                                 ?>
                                                <tr>
                                                    <td colspan="6"> 
                                                        Không có điểm rèn luyện !
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