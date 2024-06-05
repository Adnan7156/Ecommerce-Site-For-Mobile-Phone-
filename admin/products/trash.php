<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");


use App\Products;
$_product=new Products();
$_product->trash();
