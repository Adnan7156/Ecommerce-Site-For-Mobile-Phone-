<?php
$_id=$_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="SELECT * FROM `subscribers`WHERE id=:id";
$stmt=$conn->prepare($query);
$stmt->bindParam(':id',$_id);
$stmt->execute();
$subscribers=$stmt->fetch();

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
                <dd class="col-sm-9"><?= $subscribers['id'];?> </dd>

             <dt class="col-sm-3">Created:</dt>
                <dd class="col-sm-9"><?= $subscribers['created_at'];?> </dd>

             <dt class="col-sm-3">Modified:</dt>
                <dd class="col-sm-9"><?= $subscribers['modified_at'];?> </dd>
            
             <dt class="col-sm-3">Title:</dt>
                <dd class="col-sm-9"><?= $subscribers['email'];?> </dd>
           
             <dt class="col-sm-3">Reason:</dt>
                <dd class="col-sm-9"><?= $subscribers['reason'];?> </dd>
            </dl>

        </div>
    </div>
</div>
</section>

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>