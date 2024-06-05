<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
 use App\Admins;

 $_user = new Admins();
$_user->login();

   
