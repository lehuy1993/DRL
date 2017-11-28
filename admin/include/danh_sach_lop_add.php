
<?php
include_once '../core/CRUD.php';
?>
<?php //Thêm mới dữ liệu vào bảng
if(isset($_POST['themmoi'])){
	//Lấy dữ liệu trên form
	
	$TenL=$_REQUEST['TenL'];
	$TenNH=$_REQUEST['TenNH'];
	
    $dbAction=new CRUD();
	//Tạo mảng giá trị thêm
    $data = array(
                'TenL' => $TenL,
                'TenNH' => $TenNH,
            );
	
	//	Thực thi 
	if($dbAction->insert(Table::tblop,$data))
	{
		echo "<script> alert('Thêm mới thành công');
		location.href='?options=danh_sach_lop_list';</script>";	
	}else{
		echo "<script> alert('Lỗi thêm mới!!');</script>";	
	}
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản  lý danh sách lớp - năm học</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm lớp - năm học
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8" style="padding-left: 150px;">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Lớp</label>
                                            <input name="TenL" class="form-control" type="TenL" class="span4">
                                            <p class="help-block">Ví dụ: K57THB</p>
                                        </div>
                                       <div class="form-group">
                                            <label>Năm học thứ</label>
                                            <input name="TenNH" class="form-control" type="TenNH" class="span4">
                                            <p class="help-block">Ví dụ :1</p>
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
