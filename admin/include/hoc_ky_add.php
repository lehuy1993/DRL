
<?php
include_once '../core/CRUD.php';
?>
<?php //Thêm mới dữ liệu vào bảng
if(isset($_POST['themmoi'])){
    //Lấy dữ liệu trên form
    
    $TenHK=$_REQUEST['TenHK'];
    $TenNH = $_REQUEST['TenNH'];
    $Trangthai = $_REQUEST['Trangthai'];
    $dbAction=new CRUD();
    //Tạo mảng giá trị thêm
    $data = array(
                'TenHK' => $TenHK,
                'TenNH' =>$TenNH,
                'Trangthai' =>$Trangthai,
            );
    
    //  Thực thi 
    if($dbAction->insert(Table::tbhocky,$data))
    {
        echo "<script> alert('Thêm mới thành công');
        location.href='?options=hoc_ky_list';</script>";  
    }else{
        echo "<script> alert('Lỗi thêm mới!!');</script>";  
    }
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản  lý học kỳ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm học kỳ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8" style="padding-left: 150px;">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Tên học kỳ</label>
                                            <input name="TenHK" class="form-control" type="TenHK" class="span4">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên năm học</label>
                                            <input name="TenNH" class="form-control" type="TenNH" class="span4">
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select name="Trangthai" id="inputTrangthai" class="form-control" required="required">
                                                <option value="1"> Hiện</option>
                                                <option value="0"> Ẩn </option>

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
