<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Oders;
$_oder=new Oders;
$_order->update();