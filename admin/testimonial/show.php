<?php
$webroot="http://localhost/ecommerce_project backup/";
$_id=$_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="SELECT * FROM `testimonial`WHERE id=:id";
$stmt=$conn->prepare($query);
$stmt->bindParam(':id',$_id);
$stmt->execute();
$testimonial=$stmt->fetch();

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
        <div class="col-sm-8 ">

            <h1 class="text-center mb-5">Show</h1>

            <dl class="row">
             <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9"><?= $testimonial['id'];?> </dd>

                <dt class="col-sm-3">Is Active:</dt>
                 <dd class="col-sm-9"><?= $testimonial['is_active'] ? "Active" : "Inactive";?></dd>
            
             <dt class="col-sm-3">Picture:</dt>
                <dd class="col-sm-9"><?= $testimonial['picture'];?> 
                <img src="<?=$webroot?>uploads/<?= $testimonial['picture'] ?>" alt="banner" class="img-fluid"></dd>
            
             <dt class="col-sm-3">Name:</dt>
                <dd class="col-sm-9"><?= $testimonial['name'];?> </dd>
            
             <dt class="col-sm-3">Body:</dt>
                <dd class="col-sm-9"><?= $testimonial['body'];?> </dd>
            
             <dt class="col-sm-3">Designation:</dt>
                <dd class="col-sm-9"><?= $testimonial['designation'];?></dd>
            </dl>

        </div>
    </div>
</div>
</section>

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>