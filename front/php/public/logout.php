<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . "/ecommerce_project backup/config.php");
session_start();
$_SESSION = [];
session_destroy();

if (isset($_COOKIE['cart'])) {
    setcookie('cart', '', time() - 3600, '/');
}

header('Location: ' . $webroot . 'front/php/public/login.php');

exit;
