<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Carts;
$_cart= new Carts;
$carts=$_cart->show();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">Show</h1>

            <dl class="row">

                <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9"><?= $carts['id'];?> </dd>

                <dt class="col-sm-3">Product_ID:</dt>
                <dd class="col-sm-9"><?= $carts['product_id'];?> </dd>
            
            
                <dt class="col-sm-3">ProductTitle:</dt>
                <dd class="col-sm-9"><?= $carts['producttitle'];?> </dd>
                
                
                
                <dt class="col-sm-3">Unit_Price:</dt>
                <dd class="col-sm-9"><?= $carts['unit_price'];?> </dd>

                <dt class="col-sm-3">QTY:</dt>
                <dd class="col-sm-9"><?= $carts['qty'];?> </dd>
                
                <dt class="col-sm-3">Total_Price:</dt>
                <dd class="col-sm-9"><?= $carts['total_price'];?>

                <dt class="col-sm-3">Picture:</dt>
                <dd class="col-sm-9"><?= $carts['picture'];?> </dd>
                <img src="<?=$webroot?>uploads/<?= $carts['picture'] ?>" alt="banner" class="img-fluid">
                
              </dd>



              </dl>

        </div>
    </div>
</div>
</section>

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>