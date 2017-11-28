<?php
session_start();
include_once 'core/common.php';
include_once 'core/CRUD.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
</head>
<body id="home">
    <?php include_once "template/header.php"; 
    if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
     include_once "include/login.php";
     }else{
     include_once "include/login_success.php";
 	}
      ?>
    <?php include_once '/include/navigation.php' ;?>
    <?php ?>
</body>
</html>