<?php
//Khai báo hằng số cho API 
if(isset($_POST['dangnhap'])){
	include_once 'core/CRUD.php';
	$db = new CRUD();
	$where = array('Trangthai' => 1, );
	$db->select(Table::tbthoigian_sv,$where);
    $numrow = $db->num_rows();
    $where1 = array('Trangthai' => 1,
    				);
	$db->select(Table::tbthoigian_cb,$where1);
    $numrow1 = $db->num_rows();
	if($numrow > 0 || $numrow1 >0){

	
define('API_DOMAIN', 'http://pqdung.com/tech/api/');
define('API_KEY', '?zkey=8370197c5e4f107f1b4eee809e0bd6d5');

//Hàm gửi yêu cầu theo phương thức GET
function get_api($url)
{
	$url = API_DOMAIN . $url . API_KEY;
	$contents = @file_get_contents($url);
	return $contents;
}
//Thông tin đăng nhập
$username = $_POST['user'];
$password = $_POST['password'];

//Gửi yêu cầu tới API
$response = get_api('auth/login/' . $username . '/' . $password . '');

//Nếu nhận đc phản hồi bao gồm thông tin thành viên thì hiện ra tên thật.
if ($response != '') {
	
	$info = json_decode($response);

	if ($info->id) {
	$_SESSION['login'] = true;
	$_SESSION['id'] = $info->id;
	$_SESSION['user'] = $username;
	$_SESSION['tenthat'] =$info->tenthat;
	$_SESSION['chucvu'] =$info->chucvu;
	$_SESSION['lop'] =$info->lop;
	$_SESSION['ngaysinh']=$info->ngaysinh;
	$_SESSION['email']=$info->email;

		
	}
	echo "<script>alert('Bạn đang đăng nhập tài khoản $username'); 
                location.href = 'index.php';</script>";
}	
else 
{
	echo "<script>alert('Sai thông tin tài khoản')</script"; 
}
}
	else{
			echo "<script>alert('Sinh viên ngoài thời gian chấm điểm')</script"; 
	}
}
?>

<div class="row" style="background-color: rgb(215, 231, 237);" >
    <div class="col-lg-12">
    <form  action="" method="POST" class="form-inline" role="form">
    
    	<div class="form-group">
    		<label class="user" for="">Mã sinh viên :</label>
    		<input type="text" class="form-control" id="user" name="user" placeholder="MSV">
    
    		<label class="pass" for="">Mật khẩu :</label>
    		<input type="password" class="form-control" id="pass" name="password" placeholder="Mật khẩu">
    	<input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập">
    	</div>
    </form>
    </div>
    </div>
