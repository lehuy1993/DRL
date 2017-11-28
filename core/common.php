<?php
$rootURL = '';
$rootFolder='/TTCN';

if ($_SERVER["SERVER_PORT"] != "80") {
    $rootURL .= $_SERVER['DOCUMENT_ROOT'] . $rootFolder;
} else {
    $rootURL .= $_SERVER['DOCUMENT_ROOT'];
}

$CRUDUrl = $rootURL . "/core/CRUD.php";
$PaginationUrl = $rootURL . "/core/Pagination.php";
$uploadImgUrl = $rootURL . "/TTCN/public/images/";

define("__rootURL", $rootURL);
define("__CRUD", $CRUDUrl);
define("__Pagination", $PaginationUrl);
define("__UploadImage", $uploadImgUrl);

define("__rootFolder", $rootFolder);

$pageURL = "";
if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] .$rootFolder;
} else {
    $pageURL .= $_SERVER["SERVER_NAME"];
}
$imagePath = $rootFolder."/public/images/";

define("__ImagePro", $imagePath);


