<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
 use App\Users;

 $_user = new Users();
$_user->SignUp();

   
