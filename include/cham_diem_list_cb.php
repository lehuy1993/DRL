<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);//loại bỏ nhắc nhở lập trình viên  Undefined index...
?>
<?php
    include_once 'core/CRUD.php';
if($_SESSION['chucvu']==35 || $_SESSION['chucvu']==40){
    $db = new CRUD();
    $where = array('lop' => $_SESSION['lop'],
                     );
    $lop=$db->select(Table::tbkqdrl_cb,$where);
    $numrow = $db->num_rows();
    }else{
        echo "<script> alert('Bạn không phải là cán bộ lớp');
        location.href='index.php';</script>";
    }

?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản  lý điểm rèn luyện lớp <?php echo $_SESSION['lop']; ?> - năm học</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="panel panel-default">
                        <div class="panel-heading">
                           Danh sách điểm rèn luyện lớp <?php echo $_SESSION['lop']; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="text-align: center;">Mã sinh viên</th>
                                            <th style="text-align: center;">Họ tên </th>
                                            <th style="text-align: center;">Lớp</th>
                                            <th style="text-align: center;">Tổng điểm</th>
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
                                                        id="chk_<?php echo $row['MaKQDRLSV'];?>" 
                                                        name="chk_<?php echo $row['MaKQDRLSV'];?>" />
                                            </td>
                                            <td style="text-align: center;"><?php echo $row['MSV'];?></td>
                                            <td style="text-align: center;"><?php echo $row['tenthat'];?></td>
                                            <td style="text-align: center;"><?php echo $row['lop'];?></td>
                                            <td style="text-align: center;"><?php echo $row['Tongdiem'];?></td>
                                            <td class="td-actions" style="text-align: center;width:20%">
                                                        <a href="?options=drl_sv_edit&MSV=<?php echo $row['MSV'];?>" 
                                                           class="btn btn-small btn-warning" 
                                                           title="Chấm điểm sinh viên có mã[<?php echo $row['MSV'];?>]">
                                                            <i class="btn-icon-only fa fa fa-pencil"> </i>
                                                        </a>
                                                       
                                                    </td>
                                                </tr>
                                                 <?php
                                                        }// end while
                                                    }// 
                                                    else{       
                                                 ?>
                                                <tr>
                                                    <td colspan="6"> 
                                                        Không điểm rèn luyện nào !
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
    $MaKQDRLSV=isset($_REQUEST['malop'])?$_REQUEST['malop']:0;
    //2. Lấy trạng thái cần cập nhật
    //3. Kiểm tra các giá trị của biến để xác định việc cập nhật
    if($MaKQDRLSV>0  && $action=="edit")
    {       
        //Dữ liệu cập nhật
        $where=array("MaKQDRLSV"=>"$MaKQDRLSV");
        
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
    $MaKQDRLSV=isset($_REQUEST['MaKQDRLSVop'])?$_REQUEST['malop']:0;   
    //3. Kiểm tra các giá trị của biến để xác định việc xóa
    
    if($MaKQDRLSV>0 && $action=="del")
    {
        
            //5. Điều kiện xóa
            //$dieukien="Where MaKQDRLSV=$MaKQDRLSV";
            $where = array("MaKQDRLSV"=>"$MaKQDRLSV");
            
            //6. Thực thi câu lệnh cập nhật
            if($db->delete(Table::tblop,$where)==true)
            {
                echo "<script> alert('Xóa dữ liệu thành công');";
                echo "location.href='?options=danh_sach_lop_list';</script>";
            }
        
    }
?>