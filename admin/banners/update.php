<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");


use App\Banners;

$_banner=new Banners();
$_banner->update();
