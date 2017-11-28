<?php
    $conn = mysql_connect("localhost","root","") or die(mysql_error() );
    mysql_select_db("ttcn",$conn);
     mysql_query('SET NAMES "UTF-8"');
if(isset($_POST["submit"]))
{
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 1;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
    {
        $name = $filesop[0];
        
        $sql = mysql_query("INSERT INTO sinhvien (MSV) VALUES ('$name')");
    }
    
        if($sql){
            echo "<script> alert('Import CSDL thành công!');
        location.href='?options=ketqua_csv';</script>"; 

        }else{
            echo "<script> alert('Import CSDL thất bại!');
        location.href='?options=ketqua_sv';</script>"; 
        }
} 
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê điểm rèn luyện theo sinh viên cụ thể </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="panel panel-default">
                        <div class="panel-heading">
                           Import file CSV  
                        </div>
                        <div class="panel-body">
<form name="import" method="post" action="" enctype="multipart/form-data">

        <input type="file" name="file" required="" /><br />
        <input type="submit" name="submit" class="btn btn-success" value="Lọc dữ liệu" />
</form>
</div>
</div>

