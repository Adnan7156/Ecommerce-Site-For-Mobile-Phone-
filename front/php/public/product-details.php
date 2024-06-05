
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Products;
$_products = new Products();
$products = $_products->productdetail();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Detail</title>
<?php
include_once("../view/elements/head.php");
?>
</head>

<body>
<?php 
include_once("../view/elements/header.php");
include_once("../view/elements/product-detail.php");
?>

  

    
</body>

</html>