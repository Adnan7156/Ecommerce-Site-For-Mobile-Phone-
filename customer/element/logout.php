<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
session_start();
session_destroy();
header('Location: ' . $webroot . 'front/php/public/login.php');
exit;
