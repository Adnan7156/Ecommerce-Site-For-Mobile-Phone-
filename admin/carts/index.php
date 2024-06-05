
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Carts;
$_cart= new Carts;
$carts=$_cart->index();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
 <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">List</h1>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($carts as $carts):
   
    ?>
    <tr>
      
      <td><?php echo $carts['producttitle'];?></td>
      <td><a href="show.php?id=<?=$carts['id']?>">Show </a>|
      <a href="edit.php?id=<?=$carts['id']?>"> Edit</a> |
      <a href="delete.php?id=<?=$carts['id']?>">Delete</a></td>
      
    </tr>
    <?php
    
    endforeach;
    
    ?>

  </tbody>
</table>
        </div>
    </div>
</div>

 </section>  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>