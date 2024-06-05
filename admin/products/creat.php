<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");

use App\Categories;

$_category = new Categories();
$categories = $_category->index();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="../element/style.css">
  </head>
  <body>
  <?php
  include_once("../element/body.php");
  ?> 

 <section>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-8 ">

            <h1 class="text-center mb-3">Add New</h1>
            <ul class="nav d-flex fs-4 fw-bold mb-2">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </li>
                </ul>
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

             <div class="mb-3 row form-check">

                        <div class="col-sm-6">
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_active"
                                    value="1"
                                    id="inputIsActive">
                        </div>
                        <label for="inputIsActive" class="col-sm-6 form-check-label">Is Active</label>
                    </div>



                  <div class="mb-3 row form-check">

                        <div class="col-sm-6">
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_new"
                                    value="1"
                                    id="inputIsNew">
                        </div>
                        <label for="inputIsBest" class="col-sm-6 form-check-label">Is New</label>
                    </div>


                    <div class="mb-3 row">
                    <label for="inputcategoryID" class="col-sm-2 col-form-label">Categories</label>
                    <div class="col-sm-10">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                    <option selected >Select Category</option>
                    <?php
                    foreach ($categories as $category):
                    ?>
                    <option value="<?php echo $category['id']?>"><?php echo $category['name'];?></option>  
                    <?php
                    endforeach;
                    ?>
                    </select>
                    </div>
                    </div>

             
             <div class="mb-3 row">
         <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="title"
                value=" "
                id="inputTitle"
               >
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputShort_Description" class="col-sm-2 col-form-label">Short_Description</label>
            <div class="col-sm-10">
              <textarea
                type="text"
                class="form-control" 
                name="short_description"
                value=" "
                id="inputShort_Description"
                col=3 row=30
               ></textarea>
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea
                type="text"
                class="form-control" 
                name="description"
                value=" "
                id="inputDescription"
                ></textarea>
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputStock" class="col-sm-2 col-form-label">stock</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="stock"
                value=" "
                id="inputStock"
                >
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputProduct_Type" class="col-sm-2 col-form-label">Product_Type</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="product_type"
                value=" "
                id="inputProduct_Type"
               >
            </div>
             </div>
            
             <div class="mb-3 row">
         <label for="inputCost" class="col-sm-2 col-form-label">Cost</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="cost"
                value=" "
                id="inputCost"
               >
            </div>
             </div>
             <div class="mb-3 row">
         <label for="inputMRP" class="col-sm-2 col-form-label">MRP</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="mrp"
                value=" "
                id="inputMRP"
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
                                    value=""
                                    id="inputPicture">
                        </div>
                    </div>



            <button type="submit" class="btn btn-secondary mt-3">Submit</button>




            </form>


        </div>
    </div>
</div><br><br><br><br>

 </section>
 <?php
  include_once("../element/footer.php");
  ?>   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>