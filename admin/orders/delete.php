<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Oders;
$_order=new Oders;
$_order->delete();
