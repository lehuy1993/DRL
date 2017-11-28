<?php
	include_once '../core/CRUD.php';

	$db = new CRUD();
	$loaisp=$db->SELECT(Table::tbmau_drl);
$numrow = $db->num_rows();
?>

<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tiêu chí đánh giá/Điểm do cá nhân, tập thể đánh giá</th>
                                            <th>Mức tối đa</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                       <?php   
    //Kiểm tra xem có dữ liệu hay không,
    if($numrow>0){
         //Nếu có dữ liệu
     $data=$db->fetch(); 
    // đọc từng dòng dữ liệu và hiển thị
        foreach($data as $row)
        {
?>
                                        <tr>
                                            <td><?php echo $row['Tieu_chi'] ?></td>
                                            <td><?php echo $row['Muc_toi_da'] ?></td>
                                            <td>
                                            
                                        </tr>
                                       <?php
                                       		}
                                       	}
                                       ?>
                                    </tbody>
                                </table>
                            </div>