<?php
session_start();
echo '<meta charset="utf-8" />';
if (isset($_POST['adminlogin'])) {
    include_once "../../core/CRUD.php";
    $username = $_POST['admin-username'];
    $password = $_POST['admin-password'];
    //$remember = $_REQUEST['ckRemember'];
    $adminCRUD = new CRUD();
    $whereadmin = array(
        'Taikhoan' => $username,
        'Matkhau' => $password,
        'Trangthai' => 1
    );
    $adminCRUD->select(Table::tbquantri, $whereadmin);
    if ($adminCRUD->num_rows() > 0) {
            $admin = $adminCRUD->fetch();      
            $_SESSION['admin-login'] = true;
            $_SESSION['admin-username'] = $username;
            //ghi cookies
            
            echo "<script>alert('Bạn đang đăng nhập tài khoản $username'); 
                location.href = '../index.php';</script>";
      
    } else {
        echo " <script>alert('Tài khoản của bạn không tồn tại hoặc đã bị khóa!'); 
            location.href='login.php';</script>";
    }
}
?>