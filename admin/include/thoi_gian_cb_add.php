
<?php
include_once '../core/CRUD.php';
?>
<?php //Thêm mới dữ liệu vào bảng
if(isset($_POST['themmoi'])){
	//Lấy dữ liệu trên form
	
	$Tgbatdaucb=$_REQUEST['Tgbatdaucb'];
    $Tgketthuccb=$_REQUEST['Tgketthuccb'];
    $MaHK = $_REQUEST['MaHK'];
    $Trangthai = $_REQUEST['Trangthai'];
    $dbAction=new CRUD();
	//Tạo mảng giá trị thêm
    $data = array(
                'Tgbatdaucb' => $Tgbatdaucb,
                'Tgketthuccb' =>$Tgketthuccb,
                'MaHK'      =>$MaHK,
                'Trangthai' =>$Trangthai,
            );
	
	//	Thực thi 
    $where = array('MaHK' => $MaHK, );
    $check= $dbAction->select(Table::tbthoigian_cb,$where);
    $numrow = $dbAction->num_rows();
    if($numrow > 0)
    {
        echo "<script> alert('Đã tồn tại trong hệ thống!!');
        location.href='?options=thoi_gian_cb_list';</script>"; 

        die();
    }
    else{
	if($dbAction->insert(Table::tbthoigian_cb,$data))
	{
		echo "<script> alert('Thêm mới thành công');
		location.href='?options=thoi_gian_cb_list';</script>";	
	}else{
		echo "<script> alert('Lỗi thêm mới!!');</script>";	
	}
}
}
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
                            Thêm thời gian chấm
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8" style="padding-left: 150px;">
                                    <form role="form" method="post">
                                    <div class = "form-group">
                                        <label>
                                            Chọn học kỳ </label>
                                        <div class = "controls">
                                                <select class = "form-control" name = "MaHK" id = "MaHK">
                                                    <?php
                                                        $dbmaudrl=new CRUD();
                                                        $dbmaudrl->select(Table::tbhocky);
                                                        $dataloaisp=$dbmaudrl->fetch();
                                                        foreach($dataloaisp as $row){
                                                            echo '<option value="' . $row['MaHK'] .'"';
                                                            echo '>' . $row['TenHK'].'   '.$row['TenNH'] . '</option>';
                                                        }
                                                    ?>   
                                                </select>
                                        </div> <!--/controls -->
                                        <div class="form-group">
                                            <label>Thời gian bắt đầu</label>
                                            <input name="Tgbatdaucb" class="form-control" type="date" class="span4">
                                            <p class="help-block">yyyy/mm/dd</p>
                                        </div>
                                         <div class="form-group">
                                            <label>Thời gian kết thúc </label>
                                            <input name="Tgketthuccb" class="form-control" type="date" class="span4">
                                            <p class="help-block">yyyy/mm/dd</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select name="Trangthai" id="inputTrangthai" class="form-control" required="required">
                                                <option value="1"> Mở</option>
                                                <option value="0"> Đóng </option>
                                            </select>
                                        </div>
                                       <div class = "form-actions">
                                            <input type = "submit" class = "btn btn-primary" 
                                                name = "themmoi" value="Thêm mới">
                                            <input type = "reset" class = "btn" value = "Đặt lại" >
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
