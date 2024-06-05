 
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Carts;
$_cart= new Carts;
$_cart->delete();