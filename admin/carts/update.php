<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Carts;
$_carts= new Carts;
$_carts->update();
