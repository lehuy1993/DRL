<?php
    include_once '../core/CRUD.php';
$db = new CRUD();
$thoigian=$db->select(Table::tbthoigian_cb);
$numrow = $db->num_rows();

?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản  lý thời gian cán bộ lớp</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="panel panel-default">
                        <div class="panel-heading">
                           Danh sách thời gian chấm
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Thời gian bắt đầu </th>
                                            <th>Thời gian kết thúc </th>
                                            <th>Trạng thái</th>
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
                                                        id="chk_<?php echo $row['MaTGCB'];?>" 
                                                        name="chk_<?php echo $row['MaTGCB'];?>" />
                                            </td>
                                            <td><?php echo $row['Tgbatdaucb'];?></td>
                                            <td><?php echo $row['Tgketthuccb'];?></td>
                                           <td style="text-align: center;width:20%">
                                                        <select class="form-control" name="Trangthai" style="width:80%"
                                                        onChange="location.href='?options=thoi_gian_cb_list&action=edit&mathoigian=<?php  echo $row['MaTGCB'];?>&Trangthai='+this.value">
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
                                                        <a href="?options=thoi_gian_cb_edit&mathoigian=<?php echo $row['MaTGCB'];?>&MaHK=<?php echo $row['MaHK']; ?>" 
                                                           class="btn btn-small btn-warning" 
                                                           title="Chỉnh sửa thời gian  có mã[<?php echo $row['MaTGCB'];?>]">
                                                            <i class="btn-icon-only fa fa fa-pencil"> </i>
                                                        </a>
                                                        <a 
                                                        onClick="if(confirm('Bạn có chắc chắn muốn thời gian có mã là [<?php echo $row['MaTGCB'];?>] không?')){ location.href='?options=thoi_gian_cb_list&action=del&mathoigian=<?php echo $row['MaTGCB'];?>'}"
                                                            class="btn btn-small btn-warning" 
                                                            title="Xóa thời gian có mã[<?php echo $row['MaTGCB'];?>]">
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
                                                        Không có khoảng thời gian nào !
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
    $MaTGCB=isset($_REQUEST['mathoigian'])?$_REQUEST['mathoigian']:0;
    //2. Lấy trạng thái cần cập nhật
    $Trangthai=isset($_REQUEST['Trangthai'])?$_REQUEST['Trangthai']:"";
    //3. Kiểm tra các giá trị của biến để xác định việc cập nhật
    if($MaTGCB>0 && $Trangthai!="" && $action=="edit")
    {       
        //Dữ liệu cập nhật
        $data=array("Trangthai"=>"$Trangthai");
        $where=array("MaTGCB"=>"$MaTGCB");
        
        //5. Thực thi câu lệnh cập nhật
        if($db->update(Table::tbthoigian_cb,$data,$where)==true)
        {
            echo "<script> alert('Cập nhật thành công');";
            echo "location.href='?options=thoi_gian_cb_list';</script>";
        }
    }
?>
<?php
    // Phần xử lý cho chức năng xóa 
    //1. Lấy mã cần xóa
    $MaTGCB=isset($_REQUEST['mathoigian'])?$_REQUEST['mathoigian']:0;   
    //3. Kiểm tra các giá trị của biến để xác định việc xóa
    
    if($MaTGCB>0 && $action=="del")
    {
        
            //5. Điều kiện xóa
            //$dieukien="Where MaTGCB=$MaTGCB";
            $where = array("MaTGCB"=>"$MaTGCB");
            
            //6. Thực thi câu lệnh cập nhật
            if($db->delete(Table::tbthoigian_cb,$where)==true)
            {
                echo "<script> alert('Xóa dữ liệu thành công');";
                echo "location.href='?options=thoi_gian_cb_list';</script>";
            }
        
    }
?>