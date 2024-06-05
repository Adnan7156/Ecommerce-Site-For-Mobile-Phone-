<?php
 if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
    if(!isset($_SESSION['is_authenticated']))
    {
        header('location: ./../../front/php/public/login.php');
    }
?>  

<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Oders;
$_order=new Oders;
$orders=$_order->index();


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
 <section>

 <?php 
    include_once("../element/body.php"); 
 ?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">List</h1>
            <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Invoice number</th>
      <th scope="col">Product Title</th>
      <th scope="col">user Id</th>
      <th scope="col">qty</th>
      <th scope="col">Total_Price</th>
      <th scope="col">address</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($orders as $order):
   
    ?>
    <tr>
      
      <td><?php echo $order['invoice_number'];?></td>
      <td><?php echo $order['producttitle'];?></td>
      <td><?php echo $order['user_id'];?></td>
      <td><?php echo $order['qty'];?></td>
      <td><?php echo $order['total_price'];?></td>
      <td><?php echo $order['address'];?></td>


      <td>
      <!-- <a href="show.php?id=<?=$order['id']?>">Show </a>| -->
      <!-- <a href="edit.php?id=<?=$order['id']?>"> Edit</a> | -->
      <a href="delete.php?id=<?=$order['id']?>">Delete</a></td>
      
    </tr>
    <?php
    endforeach;
    
    ?>

  </tbody>
</table>
        </div>
    </div>
</div>

 </section>  <br><br>
   <?php 
   include_once("../element/footer.php");
   ?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>