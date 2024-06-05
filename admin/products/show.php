<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Products;

$_products = new Products();
$products = $_products->show();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../element/style.css">
</head>
  <body>
<?php
include_once("../element/body.php")
?>
  <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">Show</h1>

            <ul class="nav d-flex fs-4 fw-bold mb-4">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </li>
                </ul>

            <dl class="row">
               <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9"><?= $products['id'];?> </dd>

                <dt class="col-sm-3">Is Active:</dt>
                  <dd class="col-sm-9"><?= $products['is_active'] ? "Active" : "Inactive";?></dd>

                <dt class="col-sm-3">Is New:</dt>
                  <dd class="col-sm-9"><?= $products['is_new'] ? "New product" : "old product";?></dd>


                <dt class="col-sm-3">Title:</dt>
                <dd class="col-sm-9"><?= $products['title'];?> </dd>


               <dt class="col-sm-3">Short_Description:</dt>
                <dd class="col-sm-9"><?= $products['short_description'];?> </dd>
            
               <dt class="col-sm-3">Description:</dt>
                <dd class="col-sm-9"><?= $products['description'];?> </dd>

               <dt class="col-sm-3">Stock:</dt>
                <dd class="col-sm-9"><?= $products['stock'];?> </dd>
            
             <dt class="col-sm-3">Product_type:</dt>
                <dd class="col-sm-9"><?= $products['product_type'];?> </dd>
            
             <dt class="col-sm-3">Total_Sale:</dt>
                <dd class="col-sm-9"><?= $products['total_sale'];?> </dd>
            
             <dt class="col-sm-3">Cost:</dt>
                <dd class="col-sm-9"><?= $products['cost'];?> </dd>
            
             <dt class="col-sm-3">MRP:</dt>
                <dd class="col-sm-9"><?= $products['mrp'];?> </dd>

             <dt class="col-sm-3">Created:</dt>
                <dd class="col-sm-9"><?= $products['created_at'];?> </dd>

             <dt class="col-sm-3">modified:</dt>
                <dd class="col-sm-9"><?= $products['modified_at'];?> </dd>
                
             <dt class="col-sm-3">Img:</dt>
                <dd class="col-sm-9"><?= $products['picture']?>
                <img src="<?=$webroot?>uploads/<?= $products['picture'] ?>" alt="banner" class="img-fluid">
               </dd>

            </dl>
            
        </div>
    </div>
</div>
</section><br><br><br><br>

    <?php 
include_once("../element/footer.php");
?>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>