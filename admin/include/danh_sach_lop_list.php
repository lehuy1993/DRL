<?php
    include_once '../core/CRUD.php';
$db = new CRUD();
$lop=$db->select(Table::tblop);
$numrow = $db->num_rows();

?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản  lý danh sách lớp - năm học</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="panel panel-default">
                        <div class="panel-heading">
                           Danh sách lớp - năm học
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align: center;">Tên lớp</th>
                                            <th style="text-align: center;">Năm học thứ</th>
                                            <th style="text-align: center;">Thao tác</th>
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
                                                        id="chk_<?php echo $row['MaL'];?>" 
                                                        name="chk_<?php echo $row['MaL'];?>" />
                                            </td>
                                            <td style="text-align: center;"><?php echo $row['TenL'];?></td>
                                            <td style="text-align: center;"><?php echo $row['TenNH'];?></td>
                                            <td class="td-actions" style="text-align: center;width:20%">
                                                        <a href="?options=danh_sach_lop_edit&malop=<?php echo $row['MaL'];?>" 
                                                           class="btn btn-small btn-warning" 
                                                           title="Chỉnh sửa lớp có mã[<?php echo $row['MaL'];?>]">
                                                            <i class="btn-icon-only fa fa fa-pencil"> </i>
                                                        </a>
                                                        <a 
                                                        onClick="if(confirm('Bạn có chắc chắn muốn xóa lớp có mã là [<?php echo $row['MaL'];?>] không?')){ location.href='?options=danh_sach_lop_list&action=del&malop=<?php echo $row['MaL'];?>'}"
                                                            class="btn btn-small btn-warning" 
                                                            title="Xóa thời gian có mã[<?php echo $row['MaL'];?>]">
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
    $MaL=isset($_REQUEST['malop'])?$_REQUEST['malop']:0;
    //2. Lấy trạng thái cần cập nhật
    //3. Kiểm tra các giá trị của biến để xác định việc cập nhật
    if($MaL>0  && $action=="edit")
    {       
        //Dữ liệu cập nhật
        $where=array("MaL"=>"$MaL");
        
        //5. Thực thi câu lệnh cập nhật
        if($db->update(Table::tblop,$data,$where)==true)
        {
            echo "<script> alert('Cập nhật thành công');";
            echo "location.href='?options=danh_sach_lop_list';</script>";
        }
    }
?>
<?php
    // Phần xử lý cho chức năng xóa 
    //1. Lấy mã cần xóa
    $MaL=isset($_REQUEST['malop'])?$_REQUEST['malop']:0;   
    //3. Kiểm tra các giá trị của biến để xác định việc xóa
    
    if($MaL>0 && $action=="del")
    {
        
            //5. Điều kiện xóa
            //$dieukien="Where MaL=$MaL";
            $where = array("MaL"=>"$MaL");
            
            //6. Thực thi câu lệnh cập nhật
            if($db->delete(Table::tblop,$where)==true)
            {
                echo "<script> alert('Xóa dữ liệu thành công');";
                echo "location.href='?options=danh_sach_lop_list';</script>";
            }
        
    }
?>