<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);//loại bỏ nhắc nhở lập trình viên  Undefined index...
?>
<?php
session_start();
include_once '../core/common.php';
include_once '../core/CRUD.php';

if (!isset($_SESSION['admin-login']) || $_SESSION['admin-login'] == false) {
    echo "<script>location.href='../admin/user/login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cham diem ren luyen sinh vien khoa CNTT">
    <meta name="author" content="">

    <title>Trang quản trị</title>
    
        <script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Timeline CSS -->


    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    
    <!-- Custom Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <?php include_once 'template/header.php' ?>

    <?php include_once 'template/subnav.php' ?>
    </nav>
    <?php include_once '/include/navigation.php' ;?>
    </div>
    <?php include_once '/template/footer.php' ?>
    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="js/ajax.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

   

</body>

</html>
