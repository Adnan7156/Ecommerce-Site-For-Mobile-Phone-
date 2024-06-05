<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
session_start();

$current_url = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['is_authenticated'])) {
    header("location: ./../../front/php/public/login.php?previous_url=$current_url");
}

use App\Products;

$product = new Products(); 
$productInfo = $product->getProduct($_GET['id']);
$max = $productInfo['stock']; 
  



?>


<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <section>
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-sm-6 ">

            
            <form method="post" action="store.php" enctype="multipart/form-data">

              <div class="mb-3 row">
                <label for="inputID" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
              <input
              type="hidden"
              class="form-control" 
              name="id"
              value=""
              id="inputID"
              >
            </div>
          </div>

          <input type="hidden" class="form-control" name="user_id" value="<?= $_SESSION['user_id'] ?>" id="inputUserID" readonly />

          

          <div class="mb-3 row">
          <label for="inputProductID" class="col-sm-2 col-form-label">Product_ID</label>
          <div class="col-sm-10">
           <input
             type="text"
             class="form-control" 
             name="product_id"
             value="<?= $productInfo['id']?>"
             id="inputProductID"
            readonly>
          </div>
          </div>
             
          <div class="mb-3 row">
          <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
           <input
             type="text"
             class="form-control" 
             name="address"
             value="<?= $_SESSION['address'] ?>"
             id="inputAddress"
            >
          </div>
          </div>
             
          <div class="mb-3 row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">Product Title</label>
                        <div class="col-sm-10">
                            <input
                                    type="text"
                                    class="form-control"
                                    name="producttitle"
                                    value="<?= $productInfo['title']?>"
                                    id="inputTitle" 
                                    readonly/>
                        </div>
                    </div>

             <div class="mb-3 row">
         <label for="inputMrp" class="col-sm-2 col-form-label">price</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="mrp"
                value="<?= $productInfo['mrp']?>"
                id="inputMrp"
               readonly>
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputQTY" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="qty"
                value=""
                id="inputQTY"
                min="1"
                pattern="[1-<?= $max; ?>]"
                max="<?= $max; ?>"
       title="Quantity must be a number between 1 and <?= $max; ?>"
            required

               required>
            </div>
             </div>
             
             <input type="hidden" name="picture" value="<?= $productInfo['picture'] ?>" />
             <input type="hidden" name="cost" value="<?= $productInfo['cost'] ?>" />
            <button type="submit" class="btn btn-secondary mt-3">Submit</button>

            </form>


        </div>
    </div>
</div>

 </section>  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>