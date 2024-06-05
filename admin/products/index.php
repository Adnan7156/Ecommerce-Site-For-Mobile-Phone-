<?php
    session_start();
    if(!isset($_SESSION['is_authenticated']))
    {
        header('location: ./../../front/php/public/login.php');
    }
?>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Products;

$_products = new Products();
$products = $_products->index();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creat</title>
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
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">List</h1>
            <ul class="nav d-flex justify-content-center fs-4 fw-bold mb-4">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="creat.php">Add New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="trash_index.php">Trash List</a>
                    </li>

                </ul>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Titel</th>
      <th scope="col">Status</th>
      <th scope="col">Stock</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($products as $products):
   
    ?>
    <tr>
      
      <td><?php echo $products['title'];?></td>
      <td><?= $products['is_active']? "Active":"inactive";?> </td>

      <?php if ($products['stock'] > 0): ?>
      <td><?php echo $products['stock']; ?></td>
      <?php else: ?>
      <td><?php echo "out of stock"; ?></td>
        <?php endif; ?>

      <td>
      <a href="show.php?id=<?=$products['id'];?>">Show </a>|
      <a href="edit.php?id=<?=$products['id'];?>"> Edit </a>|
      <a href="trash.php?id=<?=$products['id'];?>">trash </a>
    </td>
      
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
 <?php
  include_once("../element/footer.php");
  ?> 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>