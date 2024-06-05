<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Users;
$_user=new Users();
$users=$_user->show();


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
include_once("../element/body.php");

?>
  <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-8 ">

            <h1 class="text-center mb-5">Show</h1>
            

            <ul class="nav d-flex justify-content-start fs-4 fw-bold mb-4">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </li>
                  
                </ul>

            <dl class="row">
             <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9"><?= $users['id'];?> </dd>
            
             <dt class="col-sm-3">First_Name:</dt>
                <dd class="col-sm-9"><?= $users['first_name'];?> </dd>
            
             <dt class="col-sm-3">Last_Name:</dt>
                <dd class="col-sm-9"><?= $users['last_name'];?> </dd>
            
             <dt class="col-sm-3">User_name:</dt>
                <dd class="col-sm-9"><?= $users['user_name'];?> </dd>
            
                
             <dt class="col-sm-3">Phone_number:</dt>
                <dd class="col-sm-9"><?= $users['number'];?> </dd>

             
            
                <dt class="col-sm-3">Email:</dt>
                <dd class="col-sm-9"><?= $users['email'];?> </dd>


                <dt class="col-sm-3">Address:</dt>
                <dd class="col-sm-9"><?= $users['address'];?> </dd>

            </dl>

        </div>
    </div>
</div>
</section><br><br>
<?php
  include_once("../element/footer.php");
  ?> 
    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>