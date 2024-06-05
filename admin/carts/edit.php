<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Carts;
$_cart=new Carts;
$carts=$_cart->edit();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
 <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">Edit</h1>
            <form method="post" action="update.php" enctype="multipart/form-data">

            <div class="mb-3 row">
         <label for="inputID" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input
                type="hidden"
                class="form-control" 
                name="id"
                value="<?= $carts['id'];?>"
                id="inputID"
               >
            </div>
             </div>
             <div class="mb-3 row">
          <label for="inputProduct_ID" class="col-sm-2 col-form-label">Product_ID</label>
          <div class="col-sm-10">
           <input
             type="text"
             class="form-control" 
             name="product_id"
             value="<?= $carts['product_id'];?> "
             id="inputProduct_ID"
            >
          </div>
          </div>
             
          <div class="mb-3 row">
         <label for="inputTitle" class="col-sm-2 col-form-label">ProductTitle</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="producttitle"
                value="<?= $carts['producttitle'];?>"
                id="inputProductTitle"
               >
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
              <input
                type="file"
                class="form-control" 
                name="picture"
                value="<?= $carts['picture'];?> "
                id="inputPicture"
               >
               <img src="<?=$webroot?>uploads/<?= $carts['picture'] ?>" alt="picture" class="img-fluid">

               <input 
                                 type="hidden"
                                 name="old_picture"
                                value="<?= $carts['picture'];?>">
                          
            </div>
             </div>


             <div class="mb-3 row">
         <label for="inputUnit_price" class="col-sm-2 col-form-label">Unit_price</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="unit_price"
                value="<?= $carts['unit_price'];?> "
                id="inputUnit_price"
               >
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputQTY" class="col-sm-2 col-form-label">QTY</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="qty"
                value="<?= $carts['qty'];?> "
                id="inputQTY"
               >
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputTotal_price" class="col-sm-2 col-form-label">Total_price</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="total_price"
                value="<?= $carts['total_price'];?> "
                id="inputTotal_price"
               >
            </div>
             </div>
             
            <button type="submit" class="btn btn-secondary mt-3">Submit</button>




            </form>


        </div>
    </div>
</div>

 </section>  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>