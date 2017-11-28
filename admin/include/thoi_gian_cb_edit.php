<?php
include_once '../core/CRUD.php';
?>
<?php
if(isset($_POST['edit'])){
    //Lấy dữ liệu trên form
    $MaTGCB=$_REQUEST['MaTGCB'];
    $Thoigianbatdaucb=$_REQUEST['tbbatdau_cb'];
    $Thoigianketthuccb=$_REQUEST['tgketthuc_cb'];
    $Trangthai=$_REQUEST['Trangthai'];
    $MaHK = $_REQUEST['MaHK'];
    $dbAction=new CRUD();
    //Tạo mảng giá trị sửa
    $data = array(
                'Tgbatdaucb' => $Thoigianbatdaucb,
                'Tgketthuccb'=>$Thoigianketthuccb,
                'MaHK' => $MaHK,
                'Trangthai' => $Trangthai,
            );
    $where = array('MaTGCB'=>$MaTGCB);
    
    //  Thực thi 
    if($dbAction->update(Table::tbthoigian_cb,$data,$where))
    {
        echo "<script> alert('Cập nhật dữ liệu thành công');
        location.href='?options=thoi_gian_cb_list';</script>";   
    }else{
        echo "<script> alert('Lỗi sửa đổi dữ liệu!!!');</script>";  
    }
}
?>
<?php
    if(isset($_REQUEST['mathoigian']))
    { 
        //Lấy mã trên url
        $MaTGCB=$_REQUEST['mathoigian'];
        $db=new CRUD();
        $dieukien = "MaTGCB=".$MaTGCB;
        $db->select(Table::tbthoigian_cb,$dieukien);

        $row_edit=$db->fetch();

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản  lý thời gian cán bộ lớp</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sửa thời gian chấm có mã <b><font color="#FF0000">                                       
                                [<?php echo $row_edit[0]['MaTGCB'];?>]</font>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8" style="padding-left: 150px;">
                                    <form role="form" method="post">
                                    <input type="hidden" value="<?php echo $row_edit[0]['MaTGCB'];?>" 
                                    name="MaTGCB" id="MaTGCB" />
                                    <div class = "form-group">
                                        <label>
                                            Chọn học kỳ </label>
                                        <div class = "controls">
                                                <select class = "form-control" name = "MaHK" id = "MaHK">
                                                    <?php
                                                        $dbmaudrl=new CRUD();
                                                        $MaHK = $_REQUEST['MaHK'];
                                                        $dieukien = "MaHK=".$MaHK;
                                                        $dbmaudrl->select(Table::tbhocky);
                                                        $dataloaisp=$dbmaudrl->fetch();
                                                        foreach($dataloaisp as $row){
                                                            echo '<option value="' . $row['MaHK'] .'"';
                                                            if ($row['MaHK']==$MaHK)echo "selected";  
                                                            echo '>' . $row['TenHK'].'   '.$row['TenNH'] . '</option>';
                                                        }
                                                    ?>   
                                                </select>
                                        </div> <!--/controls -->
                                        <div class="form-group">
                                            <label>Thời gian bắt đầu </label>
                                            <input name="tbbatdau_cb" class="form-control" type="date" class="span4" value="<?php echo $row_edit[0]['Tgbatdaucb'] ?>">
                                            <p class="help-block">yyyy/mm/dd</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Thời gian kết thúc</label>
                                            <input name="tgketthuc_cb" class="form-control" type="date" class="span4" value="<?php echo $row_edit[0]['Tgketthuccb'] ?>">
                                            <p class="help-block">yyyy/mm/dd</p>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for = "Trangthai">Trạng thái</label>
                                            <select class = "form-control" 
                                                        name = "Trangthai" id = "Trangthai">
                                                    <?php 
                                                        if($row_edit[0]['Trangthai']==0){
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
                                        </div>
                                        
                                       <div class = "form-actions">
                                            <input type = "submit" class = "btn btn-primary" 
                                                   name = "edit" value="Cập nhật">
                                            <input type = "reset" class = "btn btn-warning" 
                                            value = "Quay lại" 
                                            onClick="location.href='?options=thoi_gian_cb_list'" >
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