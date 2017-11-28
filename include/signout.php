<?php
$_SESSION['login'] = false;
session_destroy();
echo "<script>alert('Bạn đang thoát tài khoản '); 
location.href = 'index.php';</script>";
?>