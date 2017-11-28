<?php
include_once '../core/CRUD.php';
$db = new CRUD();
$Hocky=$db->select(Table::tbhocky);
$row=$db->fetch();
$numrow = $db->num_rows();

?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý học kỳ </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
	
                                          
<div class="panel panel-default">
                        <div class="panel-heading">
                           Danh sách học kỳ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên học kỳ </th>
                                            <th>Tên năm học </th>
                                            <th>Trạng thái </th>
                                            <th>Thao tác</th>
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
                                            <td >
                                                        <input type="checkbox" 
                                                        id="chk_<?php echo $row['MaHK'];?>" 
                                                        name="chk_<?php echo $row['MaHK'];?>" />
                                            </td>
                                            <td><?php echo $row['TenHK'];?></td>
                                            <td><?php echo $row['TenNH'] ?></td>
                                           <td style="text-align: center;width:20%">
                                                        <select class="form-control" name="Trangthai" style="width:80%"
                                                        onChange="location.href='?options=hoc_ky_list&action=edit&MaHK=<?php  echo $row['MaHK'];?>&Trangthai='+this.value">
                                                        <?php 
                                                            if($row['Trangthai']==0)
                                                            {
                                                        ?>
                                                            <option value="1">Đang mở</option>
                                                            <option value="0" selected>Đang đóng </option>
                                                         <?php
                                                            }else{
                                                         ?> 
                                                            <option value="1" selected>Đang mở</option>
                                                            <option value="0">Đang đóng</option>
                                                         <?php
                                                            }
                                                         ?> 
                                                         </select>                                                      
                                                    </td>
                                            <td class="td-actions" style="text-align: center;width:20%">
                                                        <a href="?options=hoc_ky_edi&MaHK=<?php echo $row['MaHK'];?>" 
                                                           class="btn btn-small btn-warning" 
                                                           title="Chỉnh sửa học kỳ có mã [<?php echo $row['MaHK'];?>]">
                                                            <i class="btn-icon-only fa fa fa-pencil"> </i>
                                                        </a>
                                                       <a 
                                                        onClick="if(confirm('Bạn có chắc chắn muốn xóa học kỳ có mã là [<?php echo $row['MaHK'];?>] không?')){ location.href='?options=hoc_ky_list&action=del&MaHK=<?php echo $row['MaHK'];?>'}"
                                                            class="btn btn-small btn-warning" 
                                                            title="Xóa học kỳ có mã[<?php echo $row['MaHK'];?>]">
                                                            <i class="btn-icon-only fa fa fa-times"> </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                 <?php
                                                        }// end while
                                                    }// 
                                                    else{       
                                                 ?>
                                                <tr>
                                                    <td colspan="5"> 
                                                        Không tồn tại học kỳ nào !
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
                    <?php
    // Lấy hành động
    $action=isset($_REQUEST['action'])?$_REQUEST['action']:"";
    
    // Phần xử lý cho chức năng cập nhật trạng thái 
    // Khi thay đổi trên comboBox trạng thái
    //1. Lấy mã cần cập nhật
    $MaHK=isset($_REQUEST['MaHK'])?$_REQUEST['MaHK']:0;
  //2. Lấy trạng thái cần cập nhật
    $Trangthai=isset($_REQUEST['Trangthai'])?$_REQUEST['Trangthai']:"";
    //3. Kiểm tra các giá trị của biến để xác định việc cập nhật
    if($MaHK>0 && $Trangthai!="" && $action=="edit")
    {       
        //Dữ liệu cập nhật
        $data=array("Trangthai"=>"$Trangthai");
        $where=array("MaHK"=>"$MaHK");
        
        //5. Thực thi câu lệnh cập nhật
        if($db->update(Table::tbhocky,$data,$where)==true)
        {
            echo "<script> alert('Cập nhật thành công');";
            echo "location.href='?options=hoc_ky_list';</script>";
        }
    }
?>
<?php
    // Phần xử lý cho chức năng xóa 
    //1. Lấy mã cần xóa
    $MaHK=isset($_REQUEST['MaHK'])?$_REQUEST['MaHK']:0;
    //3. Kiểm tra các giá trị của biến để xác định việc xóa
    
    if($MaHK>0 && $action=="del")
    {
        
            //5. Điều kiện xóa
            //$dieukien="Where MaHK=$MaHK";
            $where = array("MaHK"=>"$MaHK");
            
            //6. Thực thi câu lệnh cập nhật
            if($db->delete(Table::tbhocky,$where)==true)
            {
                echo "<script> alert('Xóa dữ liệu thành công');";
                echo "location.href='?options=hoc_ky_list';</script>";
            }
        
    }
?>