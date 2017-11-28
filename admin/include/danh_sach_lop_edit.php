<?php
include_once '../core/CRUD.php';
?>
<?php
if(isset($_POST['edit'])){
    //Lấy dữ liệu trên form
    $MaL=$_REQUEST['MaL'];
    $TenL=$_REQUEST['TenL'];
    $TenNH=$_REQUEST['TenNH'];
    
    $dbAction=new CRUD();
    //Tạo mảng giá trị sửa
    $data = array(
                'TenL' => $TenL,
                'TenNH' => $TenNH,
            );
    $where = array('MaL'=>$MaL);
    
    //  Thực thi 
    if($dbAction->update(Table::tblop,$data,$where))
    {
        echo "<script> alert('Cập nhật dữ liệu thành công');
        location.href='?options=danh_sach_lop_list';</script>";   
    }else{
        echo "<script> alert('Lỗi sửa đổi dữ liệu!!!');</script>";  
    }
}
?>
<?php
    if(isset($_REQUEST['malop']))
    { 
        //Lấy mã trên url
        $MaL=$_REQUEST['malop'];
        $db=new CRUD();
        $dieukien = "MaL=".$MaL;
        $db->select(Table::tblop,$dieukien);

        $row_edit=$db->fetch();

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản  lý danh sách lớp - năm học </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sửa lớp  có mã <b><font color="#FF0000">                                       
                                [<?php echo $row_edit[0]['MaL'];?>]</font>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8" style="padding-left: 150px;">
                                    <form role="form" method="post">
                                    <input type="hidden" value="<?php echo $row_edit[0]['MaL'];?>" 
                                    name="MaL" id="MaL" />
                                        <div class="form-group">
                                            <label>Tên lớp</label>
                                            <input name="TenL" class="form-control" type="TenL" class="span4" value="<?php echo $row_edit[0]['TenL'] ?>">
                                            <p class="help-block">Ví dụ : K57THB</p>
                                        </div>
                                       <div class="form-group">
                                            <label>Năm học thứ</label>
                                            <input name="TenNH" class="form-control" type="TenNH" class="span4" value="<?php echo $row_edit[0]['TenNH'] ?>">
                                            <p class="help-block">Ví dụ : 1</p>
                                        </div>
                                       
                                        
                                       <div class = "form-actions">
                                            <input type = "submit" class = "btn btn-primary" 
                                                   name = "edit" value="Cập nhật">
                                            <input type = "reset" class = "btn btn-warning" 
                                            value = "Quay lại" 
                                            onClick="location.href='?options=danh_sach_lop_list'" >
                                        </div> <!--/form-actions -->
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<?php
    }
?>