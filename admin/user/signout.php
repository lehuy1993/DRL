<?php
$_SESSION['admin-login'] = false;
unset($_SESSION['admin-Id']);
unset($_SESSION['admin-username']);
echo "<script> alert('Bạn đã đăng xuất khỏi trang admin!!!')  
location.href='user/login.php';</script>";
?>